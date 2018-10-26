<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model {
    /**
     * - - - - - fillable - - - - -  
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelle',
    ];

    /**
     * - - - - - Relations - - - - -  
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function mouvements() {
        return $this->hasMany('App\Models\Mouvement');
    }

}
