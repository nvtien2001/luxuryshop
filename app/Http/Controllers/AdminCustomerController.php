<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    //
    public function view()
    {
        $user = User::all();
        return view('back-end.view_customer', ['customers' => $user]);
    }
    public function delete($id) {
        User::where('id', $id)->delete();
        return redirect('/admin/customers');
    }
}