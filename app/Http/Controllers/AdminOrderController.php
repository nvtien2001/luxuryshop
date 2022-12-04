<?php

namespace App\Http\Controllers;

use App\Models\TblSaledorderProducts;
use App\Models\TblSaleorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function view()
    {
        $func = function($id) {
            return DB::table('tbl_saledorder_products')->where('order_id', $id)->get();
        };
        $orders = DB::table('tbl_saleorder')->get();
        $ids = [];
        foreach ($orders as $order) {
            array_push($ids, $order->id);
        }
        $order_prod = array_map($func, $ids);
        return view('back-end.view_order',['order_prod'=>$order_prod, 'orders' => $orders]);
    }
}
