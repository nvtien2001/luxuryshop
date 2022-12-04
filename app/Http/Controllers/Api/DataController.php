<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DataController extends Controller
{
    //
    public function calculateChar()
    {
        $arr = array();
        $query = function($date) {
            $sql = "SELECT SUM(p.product_price * p.quantity) as sum FROM tbl_saledorder_products p WHERE p.sold_date = '". $date . "'";
            $res = DB::select($sql);
            return $res[0]->sum == null ? 0 : $res[0]->sum;
        };
        $date=date_create(date("Y-m-d"));
        $d0 = date("Y-m-d");
        date_sub($date,date_interval_create_from_date_string("1 days"));
        $d1 = date_format($date,"Y-m-d");
        date_sub($date,date_interval_create_from_date_string("1 days"));
        $d2 = date_format($date,"Y-m-d");
        date_sub($date,date_interval_create_from_date_string("1 days"));
        $d3 = date_format($date,"Y-m-d");
        date_sub($date,date_interval_create_from_date_string("1 days"));
        $d4 = date_format($date,"Y-m-d");
        date_sub($date,date_interval_create_from_date_string("1 days"));
        $d5 = date_format($date,"Y-m-d");
        date_sub($date,date_interval_create_from_date_string("1 days"));
        $d6 = date_format($date,"Y-m-d");
        
        $arr[$d0] = $query($d0);
        $arr[$d1] = $query($d1);
        $arr[$d2] = $query($d2);
        $arr[$d3] = $query($d3);
        $arr[$d4] = $query($d4);
        $arr[$d5] = $query($d5);
        $arr[$d6] = $query($d6);
        return $arr;
    }

}
