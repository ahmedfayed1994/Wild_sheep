<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id', 'category_id', 'order_id', 'city_id', 'count', 'total', 'weight_id', 'slughter_id', 'packing_id'];
    public function user(){
        return $this->belongsTo('App\user');
    }


    public function category(){
        return $this->belongsTo('App\category');
    }
    public function order(){
        return $this->belongsTo('App\order');
    }

    public function city(){
        return $this->belongsTo('App\city');
    }

    public function weight(){
        return $this->belongsTo('App\weight');
    }

    public function slughter(){
        return $this->belongsTo('App\slughter');
    }

    public function packing(){
        return $this->belongsTo('App\packing');
    }




}
