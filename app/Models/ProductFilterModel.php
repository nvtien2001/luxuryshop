<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ProductFilterModel
{
    // Properties
    public $searchInput = "";
    public $name;
    public $categoryId = null;
    public $collectionId = null;
    public $size = null;
    public $totalPage = null;
    public $beginPrice = null;
    public $endPrice = null;
    public $sort = null;
    public $tag = null;
    public $currenPage = 1;

    public function filterProduct(ProductFilterModel $proFilter)
    {
        $sql = "SELECT * FROM tbl_products WHERE 1=1";
        if ($proFilter->searchInput != null) {
            $sql .= " AND title LIKE '%".$proFilter->searchInput."%'";
        }
        if ($proFilter->categoryId != null)
            $sql .= " AND category_id = " . $proFilter->categoryId;
        if ($proFilter->collectionId != null)
            $sql .= " AND collection_id = " . $proFilter->collectionId;
        if ($proFilter->beginPrice != null)
            $sql .= " AND price >= " . $proFilter->beginPrice;
        if ($proFilter->endPrice != null && $proFilter->endPrice > $proFilter->beginPrice)
            $sql .= " AND price <= " . $proFilter->endPrice;

        if ($proFilter->tag != null) {
            $sql .= " AND upper(title) LIKE '%" . $proFilter->tag . "%'";
        }

        if ($proFilter->sort != null)
            $sql .= " ORDER BY price " . $proFilter->sort;

        $allProducts = DB::select($sql);
        $offset = ($proFilter->currenPage - 1) * 9;
        $sql .= " LIMIT 9 OFFSET " . $offset;

        $products = DB::select($sql);

        if ($proFilter->currenPage == 1) {
            $proFilter->size = count($allProducts);
            $proFilter->totalPage = ((int) ceil((float) $proFilter->size / 9));
        }
        return $products;
    }
}
