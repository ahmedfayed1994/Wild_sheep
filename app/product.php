<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function weight()
    {
        return $this->hasmany('App\weight');
    }
}
