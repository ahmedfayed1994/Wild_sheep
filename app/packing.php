<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packing extends Model
{


    public function carts()
    {
        return $this->hasmany('App\carts');
    }
}
