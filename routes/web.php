<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@toDashboard')->name('dashboard');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard', 'HomeController@toDashboard');

    //User
    Route::resource('user', 'UserController')->except([
        'show'
    ]);
    
    //Compte
    Route::resource('compte', 'CompteController');
    
    //Mouvement
    Route::resource('mouvement', 'MouvementController')->except([
        'index', 'create', 'store', 'update', 'destroy'
    ]);
    Route::get('/mouvement/create/{idCompte}', 'MouvementController@create')->name('mouvement.create');
    Route::post('/mouvement/{idCompte}', 'MouvementController@store')->name('mouvement.store');
    
    //Transaction
    Route::resource('transaction', 'TransactionController')->except([
        'index','show', 'destroy'
    ]);
    Route::get('/transaction/create/{idMouvement}', 'TransactionController@create')->name('transaction.create');
    Route::post('/transaction/{idMouvement}', 'TransactionController@store')->name('transaction.store');
});

Auth::routes();



