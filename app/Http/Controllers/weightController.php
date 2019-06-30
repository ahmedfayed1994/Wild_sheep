<?php

namespace App\Http\Controllers;

use App\product;
use App\weight;
use Session;
use Illuminate\Http\Request;

class weightController extends Controller
{
    public function weight(){
        $weights = weight::all();
        return view('admin.page.weight.weight',compact('weights'));
    }
    public function add(){
        $products = product::all();
        return view('admin.page.weight.add',compact('products'));
    }

    public function store(Request $request){

        $new_weight = new weight();
        $new_weight->name = $request->name_weight;
        $new_weight->price = $request->price;
        $new_weight->product_id = $request->product_id;
        $new_weight->save();
        Session::flash('alert-success', 'تم حفظ البيانات بنجاح');
        return redirect('weight');
    }

    public function editWeight($id){
        $weight = weight::find($id);
        $products = product::all();
        return view('admin.page.weight.edit',compact('weight','products'));
    }

    public function update(Request $request,$id){
        $update = weight::find($id);
        $update->name = $request->name_weight;
        $update->price = $request->price;
        $update->product_id = $request->input('product_id');
        $update->update();
        Session::flash('alert-success', 'تم تعديل البيانات بنجاح');
        return redirect('weight');
    }

    public function delete($id){
        $delWeight = weight::find($id);
        $delWeight->delete();
        Session::flash('alert-success', 'تم حذف البيانات بنجاح');
        return back();
    }


}
