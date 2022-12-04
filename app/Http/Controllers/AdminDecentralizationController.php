<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminDecentralizationController extends Controller
{
    //
    public function view()
    {
        $decentralization = User::all();
        //$decentralization = User::where('is_admin', 1) -> first();
        //  $decentralization = DB::table('users')
        //                      ->select()
        //                      ->where('users.is_admin', '=', 1)
        //                      ->first();
        return view('back-end.view_decentralization', ['decentralization' => $decentralization]);
    }
    public function delete($id) {
        User::where('id', $id)->update(['is_admin'=> 0]);
        return redirect('/admin/decentralization');
    }
    public function viewAdd()
    {
        $decen = new User();
        return view('back-end.insert_decentralization',['decen' => $decen]);
    }

    public function add(Request $request)
    {
        $email = $request->input('email');
        User::where('email', $email)->update(['is_admin' => 1]);
        return redirect('/admin/decentralization');
    }
}
