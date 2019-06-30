<?php

namespace App\Http\Controllers;

use App\carts;
use App\order;
use Session;
use Illuminate\Http\Request;

class CurrentController extends Controller
{
    public function order(){
        $orders = order::where(['status' => 1])->get();
        return view('admin.page.Current.Current',compact('orders'));
    }
    public function details($id){
        $details = order::find($id);
        $carts = carts::where(['order_id' => $id])->first();
        return view('admin.page.Current.details',compact('details','carts'));
    }
    public function update($id){
        $edit = order::find($id);
        $edit->status = 2;
        $edit->save();
        Session::flash('alert-success', 'تم الموافقة على الطلب');
        return redirect('order/current');
    }

    public function delete($id){
        $details = order::find($id);
        $details->delete();

        Session::flash('alert-success', 'تم حذف الطلب');
        return redirect('order/current');

    }
}
