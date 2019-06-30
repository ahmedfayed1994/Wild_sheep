<?php

namespace App\Http\Controllers;

use App\about;
use Session;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function about(){
        $abouts = about::all();
        return view('admin.page.about.about',compact('abouts'));
    }

    public function edit($id){
        $edit = about::find($id);
        return view('admin.page.about.edit',compact('edit'));
    }

    public function update(Request $request, $id){
        $update = about::find($id);
        $update->title = $request->title;
        $update->desc = $request->desc;

        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name = rand() . time() . '.' . $ext;
            $image->move(public_path('/upload'), $name);
            $update->logo = $name;
        }


        $update->update();
        Session::flash('alert-success', 'تم تعديل البيانات بنجاح');
        return redirect('about');
    }
}
