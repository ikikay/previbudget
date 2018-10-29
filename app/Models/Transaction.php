<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transaction
 *
 * @property-read \App\Models\Mouvement $mouvement
 * @mixin \Eloquent
 */
class Transaction extends Model {

    /**
     * - - - - - static - - - - -  
     */
    public function getDates() {
        return ['created_at', 'updated_at', 'dte_effectif', 'dte_previsionnel'];
    }

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

    /**
     * - - - - - Fonctions perso - - - - -  
     */
    public function isEffectif() {
        if ($this->montant_effectif != 0) {
            return true;
        } else {
            return false;
        }
    }

}
