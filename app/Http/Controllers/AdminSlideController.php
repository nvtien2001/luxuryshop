<?php

namespace App\Http\Controllers;
use App\Models\TblBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminSlideController extends Controller
{
    //

    public function view()
    {
        $slide = TblBanner::all();
        return view('back-end.view_slide', ['slides' => $slide]);
    }

    public function viewAdd()
    {
        $slide = new TblBanner();
        return view('back-end.insert_slide',['sli' => $slide]);
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        //$img = $request->input('img');
        if ($id == null || strcmp($id, " ")==0) {
            $newid = DB::table('tbl_banner')->insertGetId([
                'id' => null, 'name' => $name, 'description' => $description,
                'url_img' => 'notfound'
            ]);
            $datas = [];
            if($request->hasfile('images'))
            {
                foreach($request->file('images') as $file)
                {
                    $namefile = time().$file->getClientOriginalName();
                    $file->move(public_path().'/file/upload/', $namefile);
                    array_push($datas, $namefile);
                }
            }
            if (count($datas) != 0) DB::table('tbl_banner')->where('id', '=', $newid)->update(['url_img' => $datas[0]]);
        }        
        else{
            $datas = [];
            foreach($request->file('images') as $file)
            {
                $namefile = time().$file->getClientOriginalName();
                $file->move(public_path().'/file/upload/', $namefile);
                array_push($datas, $namefile);
            }
            if (count($datas) != 0) 
                TblBanner::where('id', $id)->update([
                    'id' => $id,'name' => $name, 
                    'description' => $description,
                    'url_img' => $datas[0]
                ]);
            else
                TblBanner::where('id', $id)->update([
                'id' => $id,'name' => $name, 
                'description' => $description,
                ]);
        }
        return redirect('/admin/slides');
    }

    public function delete($id) {
        TblBanner::where('id', $id)->delete();
        return redirect('/admin/slides');
    }

    public function viewUpdate($id)
    {
        $slide = TblBanner::where('id', $id)->first();
        return view('back-end.insert_slide',['sli' => $slide]);
    }

    public function update(Request $request, $id) {
        TblBanner::where('id', $id)->update(['name' => $request->input('name')
        ,'description' => $request->input('description')]);
        return redirect('/admin/slides');
    }
}
