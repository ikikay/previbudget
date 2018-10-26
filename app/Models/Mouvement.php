<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model {
    /**
     * - - - - - fillable - - - - -  
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelle', 'type', 
    ];

    /**
     * - - - - - Relations - - - - -  
     */
    public function compte() {
        return $this->belongsTo('App\Models\Compte');
    }

    public function transactions() {
        return $this->hasMany('App\Models\Transaction');
    }

}
