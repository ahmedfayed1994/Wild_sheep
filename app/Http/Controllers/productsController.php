<?php

namespace App\Http\Controllers;

use App\product;
use App\weight;
use Illuminate\Http\Request;
use Session;

class productsController extends Controller
{
    public function products(){
        $products = product::get();
        return view('admin.page.products.products',compact('products'));
    }

    public function add(){
        return view('admin.page.products.add');
    }

    public function store(Request $request){

        $new_prodact = new product();
        $new_prodact->name = $request->name_prodact;
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name = rand() . time() . '.' . $ext;
            $image->move(public_path('/upload'), $name);
            $new_prodact->image = $name;
        }
        $new_prodact->save();


        Session::flash('alert-success', 'تم حفظ البيانات بنجاح');
        return redirect('product');
    }

    public function editproduct($id){
        $product = product::find($id);
        return view('admin.page.products.edit',compact('product'));
    }

   public function update(Request $request,$id){

       $edit_prodact = product::find($id);
       $edit_prodact->name = $request->name_prodact;

       if(!empty($request->file('image'))){
           $image = $request->file('image');
           $ext = $image->getClientOriginalExtension();
           $name = rand() . time() . '.' . $ext;
           $image->move(public_path('/upload'), $name);
           $edit_prodact->image = $name;
       }

       $edit_prodact->update();
       Session::flash('alert-success', 'تم حفظ البيانات بنجاح');
       return redirect('product');
   }

    public function delete($id){

        $delproduct= product::find($id);
        $delproduct->delete();


        Session::flash('alert-success', 'تم حذف البيانات بنجاح');
        return back();
    }


}
