<?php

namespace App\Http\Controllers;

use App\carts;
use App\order;
use Session;
use Illuminate\Http\Request;

class precedentController extends Controller
{
    public function order(){
        $orders = order::where(['status' => 2])->get();
        return view('admin.page.precedent.precedent',compact('orders'));
    }
    public function details($id){
        $details = order::find($id);
        $carts = carts::where(['order_id' => $id])->first();
        return view('admin.page.precedent.details',compact('details','carts'));
    }

    public function delete($id){
        $details = order::find($id);
        $details->delete();

        Session::flash('alert-success', 'تم حذف الطلب');
        return redirect('order/current');

    }
}
