<?php

namespace App\Http\Controllers;

use App\Models\ProductFilterModel;
use App\Models\TblCart;
use App\Models\TblCategorys;
use App\Models\TblCollections;
use App\Models\TblProducts;
use App\Models\TblProductsImages;
use App\Models\TblTagsearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

	public function detail($seo) {

		$product = DB::table('tbl_products')
		->select()
		->join('tbl_product_detail', 'tbl_products.id', '=', 'tbl_product_detail.product_id')
		->where('tbl_products.seo', '=', $seo)
		->first();
		$images = DB::table('tbl_products_images')
		->select()
		->where('product_id','=', $product->product_id)
		->get();
		$relatedProducts = TblProducts::where('price','>=',$product->price - 100000 )->get();
		return view('front-end.detail', [
			'product' => $product, 'images' => $images, 'relatedProducts' => $relatedProducts
			, 'cate' => 'shop'
		]);
	}

    public function shop(Request $request) {
        $request->session()->forget('FILTER_MODEL');
        return redirect('shop-search?page=1');
    }

    public function shopSearch(Request $request) {
        $session = $request->session();

			if ($session->has('FILTER_MODEL')) {
				$proFilter = $session->get('FILTER_MODEL');
			} else {
				$proFilter = new ProductFilterModel();
				$proFilter->currenPage = 1;
                $proFilter->beginPrice = -1;
			}

            $search_text = $request->input("searchInput");
			$strCategoryId = $request->input("categoryid");
			$strCollectionId = $request->input("collectionid");
			$strCurrentPage = $request->input("page");
			$strPriceBegin = $request->input("priceBegin");
			$strPriceEnd = $request->input("priceEnd");
			$strSort = $request->input("sort");
			$tag = $request->input("tag");

            if ($search_text != null) {
                $proFilter->searchInput = $search_text;
            }

            if ($tag != null) {
                $proFilter->tag = $tag;
            }

			if ($strCategoryId != null) {
				$proFilter->categoryId = (int) $strCategoryId;
                if ($proFilter->categoryId == -1) $proFilter->categoryId = null;
				$proFilter->sort = null;
                $proFilter->tag = null;
			}

			if ($strCollectionId != null) {
				$proFilter->collectionId = (int) $strCollectionId;
                if ($proFilter->collectionId == -1) $proFilter->collectionId = null;
				$proFilter->sort = null;
                $proFilter->tag = null;
			}

			if ($strPriceBegin != null) {
				$proFilter->beginPrice = (int) $strPriceBegin;
				$proFilter->sort = null;
                $proFilter->tag = null;
			}
			if ($strPriceEnd != null)
				$proFilter->endPrice = (int) $strPriceEnd;
			if ($strCurrentPage != null)
				$proFilter->currenPage = (int) $strCurrentPage;
			if ($strSort != null)
				$proFilter->sort = $strSort;
            $session->put('FILTER_MODEL', $proFilter);
			// List<Product> products = productService.filterProduct($proFilter);
			// model.addAttribute("products", products);
			// model.addAttribute("size", $proFilter.getSize());
			// model.addAttribute("totalPage", $proFilter.getTotalPage());

			// model.addAttribute("collections", webService.getAllCollection());
			// model.addAttribute("tags", webService.getAllTag());

			// model.addAttribute("currentPage", $proFilter.getCurrenPage());
			// model.addAttribute("currentCategoryId", $proFilter.getCategoryId());
			// model.addAttribute("currentCollectionId", $proFilter.getCollectionId());
			// model.addAttribute("cate", "shop");
			// model.addAttribute("price",$proFilter.getBeginPrice());

            $products = $proFilter->filterProduct($proFilter);
            $categories = TblCategorys::all();
			$collections = TblCollections::all();
            $tags = TblTagsearch::all();
			return view('front-end.shop',[
                'searchInput' => $proFilter->searchInput,
                'products' => $products, 'size' => $proFilter->size, 'totalPage' => $proFilter->totalPage
                , 'categories' => $categories, 'tags' => $tags, 'currentPage' => $proFilter->currenPage
                , 'currentCategoryId' => $proFilter->categoryId, 'cate' => 'shop', 'price' => $proFilter->beginPrice
				, 'collections' => $collections, 'currentCollectionId' => $proFilter->collectionId
            ]);
    }


}
