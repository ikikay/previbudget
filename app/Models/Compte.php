<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model {

    /**
     * - - - - - static - - - - -  
     */
    public static $rules = [
        'libelle' => 'required|min:4|max:20|regex:/^[\p{L}\s\-]+$/u',
    ];

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
