<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weight extends Model
{

    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function carts()
    {
        return $this->hasMany('App\carts');
    }

    public function users(){

        return $this->belongsToMany('App\User','rates','weight_id','user_id')->withPivot('rate');
    }
}
