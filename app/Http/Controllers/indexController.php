<?php

namespace App\Http\Controllers;

use App\carts;
use App\order;
use App\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
       $user = User::all()->count();
       $precedent = order::where(['status'=>2])->get()->count();
       $Current = order::where(['status'=>1])->get()->count();
       return view('admin.page.index',compact('user','precedent','Current'));
    }
}
