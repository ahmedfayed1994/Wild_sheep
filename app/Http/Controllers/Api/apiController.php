<?php

namespace App\Http\Controllers\Api;

use App\about;
use App\Bank;
use App\carts;
use App\contact_us;
use App\order;
use App\Rate;
use App\User;
use App\weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PhpParser\filesInDir;
use Validator;
use App\Http\Controllers\Controller;

class apiController extends Controller
{
    use ApiResponseTrail;

    public function order(Request $request)
    {

        $rules = [
            'user_id' => 'required|integer|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'city_id' => 'required|exists:cities,id',
            'weight_id' => 'required|exists:weights,id',
            'count' => 'required',
        ];

        $validate = Validator::make(request()->all(), $rules );

            if ($validate->fails()){
                foreach ((array)$validate->errors() as $key => $value){
                    foreach ($value as $msg){
                        return $this->ApiResponse(null , $msg , '404');
                    }
                }
            }

        $check_cat = carts::where(['user_id' => $request->user_id,'category_id'=>$request->category_id,'city_id'=>$request->city_id])->first();

        if ($check_cat){

            if ($request->category_id == 2) {
                $category = [
                    'packing_id' => 'required|exists:packings,id',
                    'slughter_id' => 'required|exists:slughters,id',
                ];


                $validate = Validator::make(request()->all(), $category );

                if ($validate->fails()){
                    foreach ((array)$validate->errors() as $key => $value){
                        foreach ($value as $msg){
                            return $this->ApiResponse(null , $msg , '404');
                        }
                    }
                }
            }

            $check_cat->weight_id = $request->weight_id;
            $check_cat->packing_id = $request->packing_id;
            if ($request->category_id == 1){
                $total = $check_cat->weight()->first()->price ;
            } else {
                $total = $check_cat->weight()->first()->price + $check_cat->packing()->first()->price ;
            }
            $totalXcount = $total * $request->count;

            $data = [];
            $check_cat->update(
                $data [] =[
                    'count'        => $check_cat->count + $request->count,
                    'total'        => $check_cat->total + $totalXcount,
                ]);

            return $this->ApiResponse($data);


        } else {

            if ($request->category_id == 2) {
                $category = [
                    'packing_id' => 'required|exists:packings,id',
                    'slughter_id' => 'required|exists:slughters,id',
                ];
                $validate = Validator::make(request()->all(), $category );

                if ($validate->fails()){
                    foreach ((array)$validate->errors() as $key => $value){
                        foreach ($value as $msg){
                            return $this->ApiResponse(null , $msg , '404');
                        }
                    }
                }
            }

            $order = new carts();
            $order->weight_id = $request->weight_id;
            $order->packing_id = $request->packing_id;
            if ($request->category_id == 1){
                $total = $order->weight()->first()->price ;
            } else {
                $total = $order->weight()->first()->price + $order->packing()->first()->price ;
            }

            $totalXcount = $total * $request->count;
            $data = [
                'user id'         =>      $order->user_id = $request->user_id,
                'category_id'     =>      $order->category_id = $request->category_id,
                'city_id'         =>      $order->city_id = $request->city_id,
                'weight_id'       =>      $order->weight_id = $request->weight_id,
                'slughter_id'     =>      $order->slughter_id = $request->slughter_id,
                'packing_id'      =>      $order->packing_id = $request->packing_id,
                'count'           =>      $order->count = $request->count,
                'total'           =>      $order->total = $totalXcount,
            ];

            $order->save();
            return $this->ApiResponse($data);


        }

        $order->save();
        return $this->ApiResponse($order);
    }



    public function buy (Request $request){

        $order = new order();
        $data = [];

        if ($order) {

            $rules = [
                'user_id' => 'required|integer|exists:users,id|exists:carts,user_id',
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'cash' => 'required',
                'lng' => 'required',
                'lat' => 'required',
            ];


            $validate = Validator::make(request()->all(), $rules);

            if ($validate->fails()){
                foreach ((array)$validate->errors() as $key => $value){
                    foreach ($value as $msg){
                        return $this->ApiResponse(null , $msg , '404');
                    }
                }
            }

            $buy = $order;
            $buy->data = $request->data;
            $buy->time = $request->time;
            $data []= [
                'user_id' => $buy->user_id = $request->user_id,
                'name' => $buy->name = $request->name,
                'phone' => $buy->phone = $request->phone,
                'address' => $buy->address = $request->address,
                'cash' => $buy->cash = $request->cash,
                'lng' => $buy->lng = $request->lng,
                'lat' => $buy->lat = $request->lat,
                'status' => $buy->status = 1,
                'desc' => $buy->desc = $request->desc
            ];

            $buy->save();

            $carts = carts::where(['user_id'=>$request->user_id])->get();
            foreach ($carts as $cart){
                $cart->order_id = $buy->id;
                $cart->update();
            }

            if ($buy->update() && $buy->save()) {

                return $this->ApiResponse($data);

            }


        }
    }

    public function bank()
    {
        $banks = Bank::all();
        $data = [];

        foreach ($banks as $bank){
            $data[] = [
                'name_bank'        => $bank->name_bank,
                'name_account'     => $bank->name_account,
                'iban_number'      =>  $bank->iban_number,
                'account_number'   =>  $bank->account_number,
                'image'            =>  $bank->image
            ];
        }
        return $this->ApiResponse($data);

    }

    public function rate(Request $request){

        $rules = [
            'user_id' => 'required|integer|exists:users,id|exists:users,id',
            'weight_id' => 'required|exists:weights,id',
            'rate' => 'required|max:1|min:0',

        ];


        $validate = Validator::make(request()->all(), $rules);

        if ($validate->fails()){
            foreach ((array)$validate->errors() as $key => $value){
                foreach ($value as $msg){
                    return $this->ApiResponse(null , $msg , '404');

                }
            }
        }

        $rate = Rate::where(['user_id'=>$request->user_id,'weight_id'=> $request->weight_id])->first();

        if ($rate){
            $rate-> user_id   = $request->user_id;
            $rate-> weight_id = $request->weight_id;
            $rate-> rate      = $request->rate;
            $rate->update();
                } else {
            $rate = new Rate();
            $rate-> user_id   = $request->user_id;
            $rate-> weight_id = $request->weight_id;
            $rate-> rate      = $request->rate;
            $rate->save();
    }

        if ( $rate->save() && $rate->update()){
            return $this->ApiResponse($rate);
        }
    }


    public function contact(Request $request){

        $contacts  = contact_us::get();
        $data      = [];

        foreach ($contacts as $contact){
            $data[] = [
                'facebook' => $contact->facebook,
                'whatsapp' => $contact->whatsapp,
                'phone'    => $contact->phone,
            ];
        }
        return $this->ApiResponse($data);

    }

    public function about(Request $request){
        $abouts = about::all();
        $data = [];

        foreach ($abouts as $about){
            $data[] = [
                'title'    => $about->title,
                'logo'     => $about->logo,
                'desc'    =>  $about->desc,
            ];
        }
        return $this->ApiResponse($data);
    }

    public function edit(Request $request)
    {

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|exists:users,phone',
            'password' => 'required|min:6',
        ];

        $validate = Validator::make(request()->all(), $rules);

        if ($validate->fails()){
            foreach ((array)$validate->errors() as $key => $value){
                foreach ($value as $msg){
                    return $this->ApiResponse(null , $msg , '404');
                }
            }
        }

        $data = [];
        $data[] = [
            'First Name' => $request->first_name,
            'Last Name'  => $request->last_name,
            'Phone'      => $request->phone
        ];

        {

            $edit = User::find($request->id);

            $edit->first_name = $request->first_name;
            $edit->last_name = $request->last_name;
            $edit->phone = $request->phone;
            $edit->password = bcrypt($request->password);
            $edit->update();

            return $this->ApiResponse($data);
        }

    }

    public function Requests (Request $request){

        $ordars = order::where('status',$request->status)->get();
        $data = [];

        foreach ($ordars as $ordar){
            $data[] = [
                'name'     => $ordar->name,
                'phone'    =>  $ordar->phone,
                'address'  =>  $ordar->address,
                'desc'     =>  $ordar->desc,
                'data'     =>  $ordar->data,
                'time'     =>  $ordar->time,
            ];
        }

        return $this->ApiResponse($data);

    }



    public function index (Request $request){

        $indexs = weight::all();
        $data = [];
        foreach ($indexs as $index){
            $data[] = [
                'id'        =>  $index->id,
                'name'      => $index->product()->first()->name,
                'image'     => $index->product()->first()->image,
                'weight'    => $index->name,
                'price'     => $index->price,
                'rate'      => round($index->users()->avg("rate"),"2"),
            ];
        }
        return $this->ApiResponse($data);

    }
}
