<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * - - - - - Relations - - - - -  
     */
    public function users() {
        return $this->hasMany('App\Models\User');
    }
}
