<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * - - - - - Spécifique à Users - - - - -  
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * - - - - - static - - - - -  
     */
    public static $rulesOnCreate = [
        'pseudo' => 'required|min:3|max:20|unique:users,pseudo',
        'nom' => 'nullable|min:0|max:75|regex:/^[\p{L}\s\-]+$/u', // Anecdote, noms le plus long actuellement en France 47 lettres(sans espaces):  Pourroy de L'Auberivière de Quinsonas-Oudinot de Reggio
        'prenom' => 'nullable|min:0|max:75|regex:/^[\pL\s\-]+$/u',
        'email' => 'required|min:8|max:75|email|unique:users,email',
        'password' => 'required|min:8|max:255|confirmed',
        'avatar' => 'nullable|min:0|max:255',
    ];
    public static $rulesOnUpdate = [
        'pseudo' => 'required|min:3|max:20',
        'nom' => 'nullable|min:0|max:75|regex:/^[\p{L}\s\-]+$/u', // Anecdote, noms le plus long actuellement en France 47 lettres(sans espaces):  Pourroy de L'Auberivière de Quinsonas-Oudinot de Reggio
        'prenom' => 'nullable|min:0|max:75|regex:/^[\p{L}\s\-]+$/u',
        'email' => 'required|min:8|max:75|email',
        'password' => 'nullable|min:8|max:255|confirmed',
        'avatar' => 'nullable|min:0|max:255',
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
        'pseudo',
        'nom',
        'prenom',
        'email',
        'password',
        'avatar',
        'color_id',
    ];

    /**
     * - - - - - Relations - - - - -  
     */
    public function color() {
        return $this->belongsTo('App\Models\Color');
    }
    
    public function comptes() {
        return $this->hasMany('App\Models\Compte');
    }

}
