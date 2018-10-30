<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbone\Carbone;

/**
 * App\Models\Mouvement
 *
 * @property-read \App\Models\Compte $compte
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
 * @mixin \Eloquent
 */
class Mouvement extends Model {

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
        'libelle', 'type',
    ];

    /**
     * - - - - - Relations - - - - -  
     */
    public function depense() {
        return $this->belongsTo('App\Models\Depense');
    }

    public function compte() {
        return $this->belongsTo('App\Models\Compte');
    }

    public function transactions() {
        return $this->hasMany('App\Models\Transaction');
    }

    /**
     * - - - - - Fonctions perso - - - - -  
     */
    public function transactionDuMois($moisAnneeCarbone) {
        foreach ($this->transactions as $uneTransaction) {
            if (($uneTransaction->dte_previsionnel->month == $moisAnneeCarbone->month) && ($uneTransaction->dte_previsionnel->year == $moisAnneeCarbone->year)) {
                return $uneTransaction;
            }
        }
        $uneTransaction = new Transaction();
        return $uneTransaction;
    }

}
