<?php

namespace App\Http\Controllers;

use App\slughter;
use Illuminate\Http\Request;
use Session;

class chippingController extends Controller
{
    public function slughter(){
        $slughters = slughter::get();
        return view('admin.page.chipping.chipping',compact('slughters'));
    }

    public function add(){
        return view('admin.page.chipping.add');
    }

    public function store(Request $request){

        $new = new slughter();
        $new->slughter = $request->name;
        $new->save();

        Session::flash('alert-success', 'تم حفظ البيانات بنجاح');
        return redirect('slughter');
    }

    public function editslughter($id){
        $slughter = slughter::find($id);
        return view('admin.page.chipping.edit',compact('slughter'));
    }

    public function update(Request $request,$id){

        $new = slughter::find($id);
        $new->slughter = $request->slughter;
        $new->update();

        Session::flash('alert-success', 'تم حفظ البيانات بنجاح');
        return redirect('slughter');
    }

    public function delete($id){
        $delete = slughter::find($id);
        $delete->delete();

        Session::flash('alert-success', 'تم حذف البيانات بنجاح');
        return redirect('slughter');
    }
}
