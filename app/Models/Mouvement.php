<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    public function compte() {
        return $this->belongsTo('App\Models\Compte');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
