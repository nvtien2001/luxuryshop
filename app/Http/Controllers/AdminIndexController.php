<?php

namespace App\Http\Controllers;

use App\Models\TblCategorys;
use App\Models\TblProducts;
use App\Models\TblSaleorder;
use App\Models\TblUsers;
use App\Models\TblCollections;
use App\Models\User;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function index(Request $request)
    {
        return view('back-end.index', [
            'qualityOfProduct'=> TblProducts::count(), 'qualityOfUser'=> User::count()
            , 'qualityOfCategory'=>TblCategorys::count()
            , 'qualityOfSaleOrder'=> TblSaleorder::count() , 'qualityOfCollection'=> TblCollections::count()
        ]);
    }
}
