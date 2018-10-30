<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mouvement;
use App\Models\Transaction;

class TransactionController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idMouvement) {
        $auth = Auth::user()->load('color');

        $leMouvement = Mouvement::find($idMouvement);
        $laTransaction = new Transaction();

        return view('transaction.create')
                        ->with('auth', $auth)
                        ->with("laTransaction", $laTransaction)
                        ->with("leMouvement", $leMouvement);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idMouvement) {
        $this->validate($request, Transaction::$rules);

        $laTransaction = new Transaction();
        $laTransaction->libelle = $request->get('libelle');
        $laTransaction->mouvement()->associate($idMouvement);

        $laTransaction->save();

        $request->session()->flash('success', 'La transaction à été Ajouté !');
        return redirect()->route("compte.show", ['id' => $laTransaction->mouvement->compte->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $auth = Auth::user()->load('color');
        $laTransaction = Transaction::find($id);

        return view('transaction.edit')
                        ->with('auth', $auth)
                        ->with("laTransaction", $laTransaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, Transaction::$rules);

        $laTransaction = Transaction::find($id);

        $laTransaction->update($request->all());

        $request->session()->flash('success', 'La transaction à été Modifié !');
        return redirect()->route("compte.show", ['id' => $laTransaction->mouvement->compte->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
