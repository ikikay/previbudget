<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    public function mouvement() {
        return $this->belongsTo('App\Models\Mouvement');
    }

}
