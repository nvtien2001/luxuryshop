<?php

namespace App\Http\Controllers;

use App\Models\TblBanner;
use App\Models\TblCart;
use App\Models\TblCategorys;
use App\Models\TblCollections;
use App\Models\TblProducts;
use App\Models\TblUsers;
use App\Models\TblBlogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IndexController
{

    public function logged(Request $request) {
        $user = Auth::user();
        if ($user->is_admin == false) {
            $request->session()->put('USER', $user->email);
            return redirect('/');
        } else {
            $request->session()->forget('USER_ADMIN');
            $request->session()->put('USER_ADMIN', $user);
            return redirect('/admin/index');
        }
    }

    public function index(Request $request)
    {

        $func = function($cateid) {
            return TblProducts::where('category_id', $cateid)->get();
        };

        $func2 = function($collecid) {
            return TblProducts::where('collection_id', $collecid)->get();
        };

        $num_cart = 0;
        $request->session()->forget('FILTER_MODEL'); //  = final FILTER_MODEL in shop controller
        // if ($request->session()->has('USER') && !empty($_SESSION['USER'])) {
        //     $request->session()->forget('NUM_CART');
        //     $username = $request->session()->get('USER');
        //     $user = TblUsers::where('username', $username)
        //         ->get();
        //     $carts = TblCart::where('user_id', $user['id'])
        //         ->get();
        //     foreach ($carts as $cart) {
        //         $num_cart += $cart['quantity'];
        //     }
        // }

        if ($request->session()->has('USER')) {
            $request->session()->forget('NUM_CART');
            $email = $request->session()->get('USER');
            $user = User::where('email',$email)->first();
            $carts = TblCart::where('user_id', $user->id)
                ->get();
            foreach ($carts as $cart) {
                $num_cart += $cart->quantity;
            }
        }
        $request->session()->put('num_cart', $num_cart);

        $categories = TblCategorys::all();
        $collections = TblCollections::all();
        $ids = [];
        foreach ($categories as $category) {
            array_push($ids, $category->id);
        }

        $ids_collec = [];
        foreach ($collections as $collec) {
            array_push($ids_collec, $collec->id);
        }

        // {{ $loop->index }} : get index in for eachz
        // $cate_prod = call_user_func(array($handler, 'getProductByCategory'));
        $cate_prod = array_map($func, $ids);
        $collec_prod = array_map($func2, $ids_collec);
        $hots = TblProducts::where('ishot', 1)->get();
        $news = TblProducts::where('isnew', 1)->get();
        $sales = TblProducts::where('issale', 1)->get();
        $banners = TblBanner::all();
        $blogs = TblBlogs::all();
        $cate = "home";
        return view('front-end.index', [
            'hots' => $hots, 'news' => $news, 'sales' => $sales, 'banners' => $banners, 'cate' => $cate
            , 'categories' => $categories, 'cate_prod' => $cate_prod, 'blogs' => $blogs, 'collections' => $collections,
            'collec_prod' => $collec_prod
        ]);
    }
}
