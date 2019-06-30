<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }

    public function carts()
    {
        return $this->hasmany('App\carts');
    }

}
