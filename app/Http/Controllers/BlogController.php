<?php

namespace App\Http\Controllers;

use App\Models\TblBlogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog() 
    {
        $blogs = TblBlogs::all();
        return view('front-end.blog', ['blogs' => $blogs, 'cate' => 'blog']);
    }
}
