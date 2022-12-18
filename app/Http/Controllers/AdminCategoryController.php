<?php

namespace App\Http\Controllers;

use App\Models\TblCategorys;
use Illuminate\Http\Request;
use App\Models\TblProducts;

class AdminCategoryController extends Controller
{
    public function view()
    {
        $cate = TblCategorys::all();
        return view('back-end.view_categories', ['categories' => $cate]);
    }

    public function viewAdd()
    {
        $cate = new TblCategorys();
        return view('back-end.insert_category',['cate' => $cate]);
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        if ($id == null || strcmp($id, " ") == 0) {
            TblCategorys::create([
                'id' => null,
                'name' => $name,
                'description' => $description
            ]);
        } else {
            TblCategorys::where('id', $id)->update(['name' => $request->input('name')
            ,'description' => $request->input('description')]);
        }
        return redirect('/admin/categories');
    }

    public function delete($id) {
        TblProducts::where('category_id', $id)->update([
            //'category_id' => -1
            'category_id' => null
        ]);
        TblCategorys::where('id', $id)->delete();
        return redirect('/admin/categories');
    }

    public function viewUpdate($id)
    {
        $cate = TblCategorys::where('id', $id)->first();
        return view('back-end.insert_category',['cate' => $cate]);
    }

    public function update(Request $request, $id) {
        TblCategorys::where('id', $id)->update(['name' => $request->input('name')
        ,'description' => $request->input('description')]);
        return redirect('/admin/categories');
    }
}
