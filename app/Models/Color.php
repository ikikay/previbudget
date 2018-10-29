<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Color
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @mixin \Eloquent
 */
class Color extends Model
{
    /**
     * - - - - - Relations - - - - -  
     */
    public function users() {
        return $this->hasMany('App\Models\User');
    }
}
