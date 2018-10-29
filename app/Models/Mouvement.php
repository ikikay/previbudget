<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbone\Carbone;

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

    /**
     * - - - - - Fonctions perso - - - - -  
     */
    public function transactionDuMois($moisAnnee) {
        foreach ($this->transactions as $uneTransaction) {
            if (($uneTransaction->dte_previsionnel->month == $moisAnnee->month) && ($uneTransaction->dte_previsionnel->year == $moisAnnee->year)) {
                return $uneTransaction;
            }
        }
        $uneTransaction = new Transaction();
        return $uneTransaction;
    }

}
