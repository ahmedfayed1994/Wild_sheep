<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slughter extends Model
{

    public function carts()
    {
        return $this->hasmany('App\carts');
    }
}
