<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    /**
     * - - - - - fillable - - - - -  
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dte_effectif', 'dte_previsionnel', 'montant_effectif', 'montant_previsionnel',
    ];

    /**
     * - - - - - Relations - - - - -  
     */
    public function mouvement() {
        return $this->belongsTo('App\Models\Mouvement');
    }
}
