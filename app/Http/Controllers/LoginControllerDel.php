<?php

namespace App\Http\Controllers;

use App\Models\TblUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('back-end.login');
    }

    public function login(Request $request)
    {
        $user = TblUsers::where('username', $request->input('username'))->first();
        if ($user == null) {
            return redirect('/login?error=true');
        } else {
            if (strcmp($user->password,$request->input('password')) != 0) return redirect('/login?error=true');
            else {
                if (strcmp($user->role, 'MEMBER')) {
                    $request->session()->put('USER', $user->username);
                    return redirect('/');
                } else {
                    $request->session()->put('USER_ADMIN', $user);
                    return redirect('/admin');
                }
            }
        }
    }
}
