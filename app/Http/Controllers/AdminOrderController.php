<?php

namespace App\Http\Controllers;

use App\Models\TblSaledorderProducts;
use App\Models\TblSaleorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    // public function view()
    // {
    //     $func = function($id) {
    //         return DB::table('tbl_saledorder_products')->where('order_id', $id)->get();
    //     };
    //     $orders = DB::table('tbl_saleorder')->get();
    //     $ids = [];
    //     foreach ($orders as $order) {
    //         array_push($ids, $order->id);
    //     }
    //     $order_prod = array_map($func, $ids);
    //     return view('back-end.view_order',['order_prod'=>$order_prod, 'orders' => $orders]);
    // }
    public function view()
    {
        //$orders = TblSaleorder::all();
        $orders = TblSaleorder::where('isCancel', 0)->get();
        return view('back-end.view_order1', ['orders' => $orders]);
    }
    public function view1()
    {
        //$orders = TblSaleorder::all();
        $orders = TblSaleorder::where('isCancel', 1)->get();
        return view('back-end.view_order1', ['orders' => $orders]);
    }
    public function delete($id) {
        TblSaledorderProducts::where('order_id', $id)->delete();
        TblSaleorder::where('id', $id)->delete();
        return redirect('/admin/orders');
    }
    public function update($id) {
        TblSaleorder::where('id', $id)->update([
            'isCancel' => 1
        ]);

        return redirect('/admin/orders');
    }
}
