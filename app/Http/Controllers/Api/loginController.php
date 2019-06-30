<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class loginController extends Controller
{
    use ApiResponseTrail;

    public function login(Request $request){
        $rules = [
            'phone'   =>'required|exists:Users|min:11|max:15',
            'password' =>'required',
        ];

        $validate = validator::make(request()->all(),$rules);

        if ($validate->fails()){
            foreach ((array)$validate->errors() as $key => $value){
                foreach ($value as $msg){
                    return $this->ApiResponse(null , $msg , '404');
                }
            }

        } else {
            if (auth()->attempt(['phone'=> $request['phone'],'password'=> $request['password']]))
            {
                $user               = Auth::User();
                $data['id']         = $user->id;
                $data['phone']      = $user->phone;
                $data['image']      = isset($user->image) ? $user->image : "" ;

                return $this->ApiResponse($data);

            } else {

                return $this->ApiResponse(null , 'the phone Or Password Incorrect' , '404');

            }
        }
    }

    public function register(Request $request){
        $rules = [
            'first_name'=>'required',
            'last_name' =>'required',
            'phone'     =>'required|unique:users|min:11|max:15', //|numeric
            'image'     =>'required|image',
            'password'  =>'required|min:6',
        ];

        $validate = Validator::make(request()->all(),$rules);

        if ($validate->fails()){
            foreach ((array)$validate->errors() as $key => $value){
                foreach ($value as $msg){
                    return $this->ApiResponse(null , $msg , '404');
                }
            }
        }

            {
                $sign = new User();
                $sign->first_name = $request->first_name;
                $sign->last_name = $request->last_name;
                $sign->device_id = 50250;
                $sign->phone = $request->phone;
                $sign->password = bcrypt($request->password);


            if ($request->file('image')){
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $name = rand().time(). '.' .$ext;
                $image->move(public_path('/upload'),$name);
                $sign->image = $name;
            }
                $sign->save();

            $data[] = [

               'First Name' => $request->first_name,
               'Last Name'  => $request->last_name,
               'phone'      => $request->phone,
            ];

                return $this->ApiResponse($data);
            }
        }
}
