<?php

namespace App\Http\Controllers;

use App\Models\TblCategorys;
use App\Models\TblProductDetail;
use App\Models\TblProducts;
use App\Models\TblProductsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function view()
    {
        $products = TblProducts::all();
        return view('back-end.view_products', ['products' => $products]);
    }

    public function viewAdd()
    {
        $prod = new TblProducts();
        return view('back-end.insert_product', ['categories' => TblCategorys::all(), 'prod'=>$prod]);
    }

    public function viewUpdate($id)
    {
        $prod = DB::table('tbl_products')
            ->select()
            ->join('tbl_product_detail', 'tbl_products.id', '=', 'tbl_product_detail.product_id')
            ->where('tbl_products.id', '=', $id)
            ->first();
        $prod->id = $prod->product_id;
        return view('back-end.insert_product', ['prod' => $prod, 'categories' => TblCategorys::all()]);
    }

    public function delete($id)
    {
        TblProductDetail::where('product_id', $id)->delete();
        TblProductsImages::where('product_id', $id)->delete();
        TblProducts::where('id', $id)->delete();
        return redirect('/admin/products');
    }

    public function add(Request $request)
    {

        $func = function ($str) {
			$before = array(
				'àáâãäåòóôõöøèéêëðçìíîïùúûüñšž',
				'/[^a-z0-9\s]/',
				array('/\s/', '/--+/', '/---+/')
			);
			$after = array(
				'aaaaaaooooooeeeeeciiiiuuuunsz',
				'',
				'-'
			);
			$str = strtolower($str);
			$str = strtr($str, $before[0], $after[0]);
			$str = preg_replace($before[1], $after[1], $str);
			$str = trim($str);
			$str = preg_replace($before[2], $after[2], $str);
			return $str.'-'.time();
		};

        $id = (int) $request->input('id');
        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $isHot = $request->input('isHot');
        if ($isHot == null) $isHot = 0; else $isHot = 1;
        $isNew = $request->input('isNew');
        if ($isNew == null) $isNew = 0; else $isNew = 1;
        $isSale = $request->input('isSale');
        if ($isSale == null) $isSale = 0; else $isSale = 1;
        $priceOld = (float) $request->input('priceOld');
        $price = (float) $request->input('price');
        $detailDescription = $request->input('detailDescription');
        $material = $request->input('material');
        $origin = $request->input('origin');

        if ($id == null || strcmp($id, " ")==0) {
            $newid = DB::table('tbl_products')->insertGetId([
                'id' => null, 'title' => $title, 'category_id' => $category_id
                , 'ishot' => $isHot, 'isnew' => $isNew, 'issale' => $isSale, 'seo' => $func($title)
                , 'price_old' => $priceOld, 'price' => $price , 'detail_description' => $detailDescription,
                'url_avatar' => 'notfound'
            ]);
            $datas = [];
            if($request->hasfile('images'))
            {
                foreach($request->file('images') as $file)
                {
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/file/upload/', $name);
                    DB::table('tbl_products_images')->insert([
                        'path' => $name, 'product_id' => $newid
                    ]); 
                    array_push($datas, $name);
                }
            }
            if (count($datas) != 0) DB::table('tbl_products')->where('id', '=', $newid)->update(['url_avatar' => $datas[0]]);
            DB::table('tbl_product_detail')->insert([
                'product_id' => $newid, 'material' => $material, 'origin' => $origin
            ]);
        } else {
            $datas = [];
            if($request->hasfile('images'))
            {
                DB::table('tbl_products_images')->where('product_id','=',$id)->delete();
                foreach($request->file('images') as $file)
                {
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/file/upload/', $name);
                    DB::table('tbl_products_images')->insert([
                        'path' => $name, 'product_id' => $id
                    ]); 
                    array_push($datas, $name);
                }
            }
            if (count($datas) != 0) 
                TblProducts::where('id', $id)->update([
                    'id' => $id,'title' => $title, 'category_id' => $category_id
                    , 'ishot' => $isHot, 'isnew' => $isNew, 'issale' => $isSale, 'seo' => $func($title)
                    , 'price_old' => $priceOld, 'price' => $price , 'detail_description' => $detailDescription,
                    'url_avatar' => $datas[0]
                ]);
            else
                TblProducts::where('id', $id)->update([
                    'id' => $id, 'title' => $title, 'category_id' => $category_id
                    , 'ishot' => $isHot, 'isnew' => $isNew, 'issale' => $isSale, 'seo' => $func($title)
                    , 'price_old' => $priceOld, 'price' => $price , 'detail_description' => $detailDescription
                ]);
        }
        return redirect('/admin/products');
    }
}
