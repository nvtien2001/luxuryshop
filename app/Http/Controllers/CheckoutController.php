<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblCart;
use App\Models\TblProducts;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //
    public function choose_product_to_cart(Request $request) {
        $productId = $this->getProductId($request);
        $quantity = $this->getQuantity($request);
        $message;

        // kiểm tra người dùng đã đăng nhập
        if($request->session()->has('USER')){
            // lấy email
            $email = $request->session()->get('USER');
            $user = DB::table('users')->where('email', $email)->first();

            $cart = DB::table('tbl_cart')
                    ->where('product_id', $productId)
                    ->where('user_id', $user -> id)
                    ->first();
                    
            // trường hợp chưa đặt sản phẩm
            if ($cart == null){
                DB::table('tbl_cart')->insert(
                    array('product_id' => $productId, 'user_id' => $user->id, 'quantity' => $quantity)
                );
            }else{
                $soluong = DB::table('tbl_cart')
                            ->where('product_id', $productId)
                            ->where('user_id', $user -> id)
                            ->first()
                            ->quantity;
                if ($soluong + $quantity > 0){
                    DB::table('tbl_cart')
                        ->where('product_id', $productId)
                        ->where('user_id', $user -> id)
                        ->update(array('quantity' => $soluong + $quantity));
                } else
                {
                    DB::table('tbl_cart')
                            ->where('product_id', $productId)
                            ->where('user_id', $user -> id)
                            ->delete();
                }
            }
        }
        else{
            $carts = $request->session()->get('gCART');
            if ($carts == null){
                $carts = array();
            }
            // nếu không tồn tại key
            if (!array_key_exists("idsp".$productId, $carts)){
                $carts["idsp".$productId] = 0;
            }
            $carts["idsp".$productId] = $carts["idsp".$productId] + $quantity;
            //xóa mặt hàng khỏi giỏ khi số lượng <= 0
            if ($carts["idsp".$productId] <= 0){
                unset($carts["idsp".$productId]);
            }
            $request->session()->put('gCART', $carts);
        }
        $message = "Thêm giỏ hàng thành công";
        return view('front-end.thongbao', ['message' => $message]);
    }

    private function getProductId(Request $request){
        return $request->productId;
    }
    private function getQuantity(Request $request){
        return $request->quantity;
    }

    ////////////////-------- load dữ liệu ra Giỏ hàng ---------- ///////////////////////
    public function shopping_cart(Request $request){
        // đã đăng nhập
        $carts = array();
        if($request->session()->has('USER')){
            // xử lý khi lần đầu đăng nhập, mà vẫn giữ giỏ hàng lúc chưa đăng nhập
            if ($request->session()->has('gCART')){
                $cartskhichualogin = $request->session()->get('gCART');
                if ($cartskhichualogin != null){
                    foreach ($cartskhichualogin as $key => $value)  {
                        $cartcosan = DB::table('tbl_cart')
                            ->where('product_id', (int)(explode("idsp", $key)[1]))
                            ->where('user_id', $this->GetUser($request)-> id)
                            ->first();
                        if ($cartcosan != null){
                            $soluong = ($value > $cartcosan->quantity)?$value:$cartcosan->quantity;
                            DB::table('tbl_cart')
                            ->where('product_id', $this->getProductId($request))
                            ->where('user_id', $this->GetUser($request)-> id)
                            ->update(array('quantity' => $soluong));
                        }else{
                            $soluong = $value;
                            DB::table('tbl_cart')
                            ->insert(
                                array(
                                    "product_id" => ((int)(explode("idsp", $key)[1])),
                                    'user_id' => $this->GetUser($request)-> id,
                                    'quantity' => $soluong
                                )
                            );
                        }
                    }
                    $request->session()->forget('gCART');
                }
            }



            $email = $request->session()->get('USER');
            $user = DB::table('users')->where('email', $email)->first();
            $carts = DB::table('tbl_cart')
            ->join('users', 'users.id', '=', 'tbl_cart.user_id')
            ->join('tbl_products', 'tbl_products.id', '=', 'tbl_cart.product_id')
            ->where("tbl_cart.user_id", '=', $user->id)
            ->select('tbl_products.url_avatar', 'tbl_products.id', 'tbl_products.title', 
            'tbl_products.price', 'tbl_cart.quantity'
            )
            ->get();
        }
        // trường hợp chưa đăng nhập
        else{
            $hangluutam = $request->session()->get('gCART');
            if ($hangluutam == null){
                $hangluutam = array();
            }
            foreach ($hangluutam as $key => $value) {
                $productId = (int)(explode("idsp", $key)[1]);
                $cart = DB::table('tbl_products')
                    ->where("id", '=', $productId)
                    ->select('url_avatar', 'id', 'title', 'price')
                    ->first();
                $cart -> quantity = $value;
                array_push($carts, $cart);
            }
        }
        $cate = "shop";
        return view("front-end.shopping-cart", ["carts" => $carts, "cate" => $cate]);
    }


    ///////////////--------- Cập nhật giỏ hàng -------------//////////////////
    public function change_product_cart(Request $request){
        $productId = $this->getProductId($request);
        $quantity = $this->getQuantity($request);
        $message;

        // kiểm tra người dùng đã đăng nhập
        if($request->session()->has('USER')){
            // lấy email
            $email = $request->session()->get('USER');
            
            $user = DB::table('users')->where('email', $email)->first();

            // trường hợp chưa đặt sản phẩm
            if ($quantity > 0){
                DB::table('tbl_cart')
                    ->where('product_id', $productId)
                    ->where('user_id', $user -> id)
                    ->update(array('quantity' => $quantity));
            } else
            {
                DB::table('tbl_cart')
                        ->where('product_id', $productId)
                        ->where('user_id', $user -> id)
                        ->delete();
            }
        
        }
        else{
            $carts = $request->session()->get('gCART');
            
            // if ($carts == null){
            //     $carts = array();
            // }
            // // nếu tồn tại key
            $carts["idsp".$productId] = $quantity;
            
            //xóa mặt hàng khỏi giỏ khi số lượng <= 0
            if ($carts["idsp".$productId] <= 0){
                unset($carts["idsp".$productId]);
            }
            $request->session()->put('gCART', $carts);
        }
        $message = "Thêm giỏ hàng thành công";
        return view('front-end.thongbao', ['message' => $message]);
    }


    ///////////////--------- Xóa hàng trong giỏ hàng -------------//////////////////
    public function remove_product(Request $request){
        $productId = $this->getProductId($request);
        $message;

        // kiểm tra người dùng đã đăng nhập
        if($request->session()->has('USER')){
            // lấy email
            $email = $request->session()->get('USER');
            
            $user = DB::table('users')->where('email', $email)->first();

            // trường hợp chưa đặt sản phẩm
            DB::table('tbl_cart')
                ->where('product_id', $productId)
                ->where('user_id', $user -> id)
                ->delete();
        }
        else{
            $carts = $request->session()->get('gCART');
            unset($carts["idsp".$productId]);
            $request->session()->put('gCART', $carts);
        }
        $message = "Xóa hàng trong giỏ hàng thành công";
        return view('front-end.thongbao', ['message' => $message]);
    }

    //////////////---------- Hoá đơn  ---------------------//////////
    public function checkout(Request $request){
        if($request->session()->has('USER')){
            $carts = $this->GetCartsByUser($request);
            $user = $this->GetUser($request);
            $total = $this->GetTotalMoney($request);
            $cate = "shop";
            return view('front-end.checkout', ["carts" => $carts, "user" => $user, "total" => $total, 'cate' => $cate]);
        }else{
            return view('auth.login');
        }
    }
    private function GetUser(Request $request){
        $email = $request->session()->get('USER');
        $user = DB::table('users')->where('email', $email)->first();
        return $user;
    }
    private function GetCartsByUser(Request $request){
        $carts;
        if($request->session()->has('USER')){
            $email = $request->session()->get('USER');
            $user = DB::table('users')->where('email', $email)->first();
            $carts = DB::table('tbl_cart')
            ->join('users', 'users.id', '=', 'tbl_cart.user_id')
            ->join('tbl_products', 'tbl_products.id', '=', 'tbl_cart.product_id')
            ->where("tbl_cart.user_id", '=', $user->id)
            ->select('tbl_products.url_avatar', 'tbl_products.id', 'tbl_products.title', 
            'tbl_products.price', 'tbl_cart.quantity', 'tbl_cart.user_id'
            )
            ->get();
        return $carts;
        }
    }
    private function GetTotalMoney(Request $request){
        $total = 0;
        $carts = $this->GetCartsByUser($request);
        
        foreach ($carts as $cart) {
            $total = $total + $cart->price * $cart -> quantity;
        }
        return $total;
    }

    ////// ------------- Lưu hóa đơn  --------------- /////////////
    public function save_cart(Request $request){

        $this->CapNhatDuLieuNguoiDungTuHoaDon($request);
        $thongtintuuser = $this->LayDuLieuTuHoaDon($request);
        $idHoaDon = DB::table('tbl_saleorder')->count() + 1;

        // thêm dữ liệu vào bảng bill
        DB::table('tbl_saleorder')->insert(
            array(
                'id' => $idHoaDon, 
                "code" => $thongtintuuser["discountName"],
                "customer_address" => $thongtintuuser["customerAddress"],
                "customer_email" => $thongtintuuser["customerEmail"],
                "customer_name" => $thongtintuuser["customerName"],
                "customer_note" => $thongtintuuser["customerNote"],
                "customer_phone" => $thongtintuuser["customerPhone"],
                "isCancel" => 0,
                
                "total" => $thongtintuuser["total"],
                "total_received" => $thongtintuuser["total_received"],
                "user_id" => $thongtintuuser["user_id"]
            )
        );

        
        $carts = $this->GetCartsByUser($request);
        $today = date("Y/m/d");
        foreach ($carts as $cart) {
            // thêm dữ liệu vào bảng tbl_saledorder_products
            DB::table('tbl_saledorder_products')->insert(
                array(
                    "product_price" => $cart->price,
                    "product_title" => $cart->title,
                    "quantity" => $cart->quantity,
                    "sold_date" => $today,
                    "order_id" => $idHoaDon,
                )
            );
            // xóa dữ liệu từ bảng cart
            DB::table('tbl_cart')
                ->where("product_id", $cart->id)
                ->where("user_id", $cart->user_id)
                ->delete();
        }
        $cate = 'shop';
        // $num_cart = 0;
        // if ($request->session()->has('USER')) {
        //     $request->session()->forget('NUM_CART');
        //     $email = $request->session()->get('USER');
        //     $user = User::where('email',$email)->first();
        //     $carts = TblCart::where('user_id', $user->id)
        //         ->get();
        //     foreach ($carts as $cart) {
        //         $num_cart += $cart->quantity;
        //     }
        // }
        // $request->session()->put('num_cart', $num_cart);
        return view('front-end.billsuccess', ["cate" => $cate]);
    }

    private function LayDuLieuTuHoaDon(Request $request){
        $data = array();
        $data["customerName"] = $request->input("customerName");
        $data["customerAddress"] = $request->input("customerAddress");
        $data["customerPhone"] = $request->input("customerPhone");
        $data["customerEmail"] = $request->input("customerEmail");
        $data["customerNote"] = $request->input("customerNote");
        $data["discountName"] = $request->input("discount");


        $data["user_id"] = $this->GetUser($request)->id;
        $data["total"] = $this->GetTotalMoney($request);
        try{
            $data["total_received"] = $data["total"] - $data["total"] * $this->GetDiscount($request);
        }catch(Exception $e){
            $data["total_received"] = $data["total"];
        }
        return $data;
    }
    private function GetDiscount(Request $request){
        $discountName = $request->input("discount");
        $message = "";
        $discount = DB::table('tbl_discount')
            ->where('name', $discountName)->first();
        if ($discount == null){
           return 0;
        }else {
            return $discount->discount;
        }
    }
    private function CapNhatDuLieuNguoiDungTuHoaDon(Request $request){
        $thongtintuuser = $this->LayDuLieuTuHoaDon($request);
        $email = $request->session()->get('USER');
        $user = DB::table('users')->where('email', $email)->first();
        DB::table('users')
            ->where('id', $user->id)
            ->update(array('name' => $thongtintuuser["customerName"], 
                            'address' => $thongtintuuser["customerAddress"],
                            'phonenumber' => $thongtintuuser["customerPhone"]
            )
        );
    }

    ///// ------------ kiểm tra giảm giá -----------------////
    // trả về tỉ lệ được giảm, nếu không tồn tại mã trả về notfound
    public function check_discount(Request $request){
        $discountName = $request->discountName;;
        $message = "";
        $discount = DB::table('tbl_discount')
            ->where('name', $discountName)->first();
        if ($discount == null){
           $message = "notfound";
        }else {
            $message = $discount->discount;
        }
        return view('front-end.thongbao', ["message" => $message]);
    }
}
