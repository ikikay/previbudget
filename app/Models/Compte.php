<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model {

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function mouvements() {
        return $this->hasMany('App\Models\Mouvement');
    }

}
