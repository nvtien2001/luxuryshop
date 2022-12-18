<?php

namespace App\Http\Controllers;
use App\Models\TblProducts;
use App\Models\TblCollections;
use Illuminate\Http\Request;

class AdminCollectionController extends Controller
{
    //
    public function view()
    {
        $collec = TblCollections::all();
        return view('back-end.view_collection', ['collections' => $collec]);
    }

    public function viewAdd()
    {
        $collec = new TblCollections();
        return view('back-end.insert_collection',['collec' => $collec]);
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        if ($id == null || strcmp($id, " ") == 0) {
            TblCollections::create([
                'id' => null,
                'name' => $name,
                'description' => $description
            ]);
        } else {
            TblCollections::where('id', $id)->update(['name' => $request->input('name')
            ,'description' => $request->input('description')]);
        }
        return redirect('/admin/collections');
    }

    public function delete($id) {
        TblProducts::where('collection_id', $id)->update([
            'collection_id' => null
        ]);
        TblCollections::where('id', $id)->delete();
        return redirect('/admin/collections');
    }

    public function viewUpdate($id)
    {
        $collec = TblCollections::where('id', $id)->first();
        return view('back-end.insert_collection',['collec' => $collec]);
    }

    public function update(Request $request, $id) {
        TblCollections::where('id', $id)->update(['name' => $request->input('name')
        ,'description' => $request->input('description')]);
        return redirect('/admin/collections');
    }
}
