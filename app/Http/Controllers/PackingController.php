<?php

namespace App\Http\Controllers;

use App\packing;
use Illuminate\Http\Request;
use Session;

class PackingController extends Controller
{
    public function packing(){
        $packing = packing::all();
        return view('admin.page.packing.packing',compact('packing'));
    }

    public function add(){
        return view('admin.page.packing.add');
    }

    public function store(Request $request){

        $new = new packing();
        $new->packing = $request->packing;
        $new->price = $request->price;
        $new->save();

        Session::flash('alert-success', 'تم حفظ البيانات بنجاح');
        return redirect('packing');
    }

    public function editpacking($id){
        $packing = packing::find($id);
        return view('admin.page.packing.edit',compact('packing'));
    }

    public function update(Request $request,$id){

        $new = packing::find($id);
        $new->packing = $request->packing;
        $new->price = $request->price;
        $new->update();

        Session::flash('alert-success', 'تم حفظ البيانات بنجاح');
        return redirect('packing');
    }

    public function delete($id){
        $delete = packing::find($id);
        $delete->delete();

        Session::flash('alert-success', 'تم حذف البيانات بنجاح');
        return redirect('packing');
    }
}
