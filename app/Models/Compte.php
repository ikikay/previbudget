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
    public function sommeRevenusPrevisionnelDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depense_id == 1) {
                if (!$unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

    public function sommeRevenusEffectifDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depense_id == 1) {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                }
            }
        }
        return $somme;
    }

    public function sommeRevenusDuMois($moisAnneeCarbone) {
        $somme = 0;
        $somme = $somme + $this->sommeRevenusPrevisionnelDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeRevenusEffectifDuMois($moisAnneeCarbone);
        return $somme;
    }

    public function sommeDepensesFixesPrevisionnelDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depense_id == 2) {
                if (!$unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesFixesEffectifDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depense_id == 2) {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesFixesDuMois($moisAnneeCarbone) {
        $somme = 0;
        $somme = $somme + $this->sommeDepensesFixesPrevisionnelDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeDepensesFixesEffectifDuMois($moisAnneeCarbone);
        return $somme;
    }

    public function sommeDepensesVariablePrevisionnelDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depense_id == 3) {
                if (!$unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesVariableEffectifDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depense_id == 3) {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesVariableDuMois($moisAnneeCarbone) {
        $somme = 0;
        $somme = $somme + $this->sommeDepensesVariablePrevisionnelDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeDepensesVariableEffectifDuMois($moisAnneeCarbone);
        return $somme;
    }

    public function sommeDepensesOccasionnellesPrevisionnelDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depense_id == 4) {
                if (!$unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_previsionnel;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesOccasionnellesEffectifDuMois($moisAnneeCarbone) {
        $somme = 0;
        foreach ($this->mouvements as $unMouvement) {
            if ($unMouvement->depense_id == 4) {
                if ($unMouvement->transactionDuMois($moisAnneeCarbone)->isEffectif()) {
                    $somme = $somme + $unMouvement->transactionDuMois($moisAnneeCarbone)->montant_effectif;
                }
            }
        }
        return $somme;
    }

    public function sommeDepensesOccasionnellesDuMois($moisAnneeCarbone) {
        $somme = 0;
        $somme = $somme + $this->sommeDepensesOccasionnellesPrevisionnelDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeDepensesOccasionnellesEffectifDuMois($moisAnneeCarbone);
        return $somme;
    }

    public function sommeTotalPrevisionnelDuMois($moisAnneeCarbone) {
        $somme = 0;
        $somme = $somme + $this->sommeDepensesFixesPrevisionnelDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeDepensesVariablePrevisionnelDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeDepensesOccasionnellesPrevisionnelDuMois($moisAnneeCarbone);
        return $somme;
    }

    public function sommeTotalEffectifDuMois($moisAnneeCarbone) {
        $somme = 0;
        $somme = $somme + $this->sommeDepensesFixesEffectifDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeDepensesVariableEffectifDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeDepensesOccasionnellesEffectifDuMois($moisAnneeCarbone);
        return $somme;
    }

    public function sommeTotalDuMois($moisAnneeCarbone) {
        $somme = 0;
        $somme = $somme + $this->sommeTotalPrevisionnelDuMois($moisAnneeCarbone);
        $somme = $somme + $this->sommeTotalEffectifDuMois($moisAnneeCarbone);
        return $somme;
    }
    
    public function sommeRevenusMoinsDepensesDuMois($moisAnneeCarbone){
        $somme = 0;
        $somme = $somme + $this->sommeRevenusDuMois($moisAnneeCarbone) - $this->sommeTotalDuMois($moisAnneeCarbone);
        return $somme;
    }

}
