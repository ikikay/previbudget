<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Color
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @mixin \Eloquent
 */
class Depense extends Model
{
    /**
     * - - - - - Relations - - - - -  
     */
    public function mouvements() {
        return $this->hasMany('App\Models\Mouvement');
    }
}
