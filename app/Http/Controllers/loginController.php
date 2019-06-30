<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class loginController extends Controller
{

    public function index(){
        return view('admin.page.index');
    }
    public function login(){
        return view('admin.page.login');
    }

        public function sign(Request $request){


            if (Auth::attempt(

                [   'phone' => $request['phone'],
                    'password' => $request['password'],
                ])) {

                return redirect('index');
            } else {
                return back();
            }

        }


}
