<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Compte
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mouvement[] $mouvements
 * @property-read \App\Models\User $user
 * @mixin \Eloquent
 */
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

    /**
     * - - - - - Fonctions perso - - - - -  
     */
    public function sommeRevenusDuMois($moisAnnee) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depennse_id == 1) {
                if ($unMouvement->transactionDuMois($moisAnnee)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                } else {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesFixesDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depennse_id == 2) {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                } else {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesVariableDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depennse_id == 3) {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                } else {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesOccasionnellesDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depennse_id == 4) {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                } else {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

    public function sommeTotalDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depennse_id == 1) {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme - $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                } else {
                    $somme = $somme - $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            } else {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                } else {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

}
