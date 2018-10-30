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
    Route::get('dashboard', 'HomeController@toDashboard');

    Route::resource('user', 'UserController')->except([
        'show'
    ]);
    Route::resource('compte', 'CompteController');
    Route::resource('mouvement', 'MouvementController')->except([
    'create', 'store'
    ]);
    Route::get('/mouvement/create/{idCompte}', 'MouvementController@create')->name('mouvement.create');
    Route::post('/mouvement/{idCompte}', 'MouvementController@store')->name('mouvement.store');
    Route::resource('transaction', 'TransactionController')->except([
        'index', 'create', 'store', 'show', 'update', 'destroy'
    ]);

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();



