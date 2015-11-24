<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    public function topics()
    {
    	return $this->hasMany('App\Topic');
    }
}
