<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
    public function create(Request $request) {
        $auth = Auth::user()->load('color')->load('comptes');

        $laTransaction = new Transaction();
        $laTransaction->montant_effectif = 0;

        return view('transaction.create')
                        ->with('auth', $auth)
                        ->with("laTransaction", $laTransaction)
                        ->with("mouvement_id", $request->get('mouvement_id'))
                        ->with("jours", 1)
                        ->with("mois", $request->get('mois'))
                        ->with("annee", $request->get('annee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, Transaction::$rules);

        for ($i = 0; $i > ($request->get('nbrMois') * -1); $i--) {
            $laTransaction = new Transaction();
            $laTransaction->dte_effectif = Carbon::create(2000, 1, 1, 0, 0, 0);
            $datePrevu = Carbon::createFromFormat('d/m/Y', $request->get('dte_previsionnel'));
            $datePrevu->subMonth($i);
            $laTransaction->dte_previsionnel = $datePrevu;
            $laTransaction->montant_effectif = 0;
            $laTransaction->montant_previsionnel = $request->get('montant_previsionnel');
            $laTransaction->mouvement()->associate($request->get('mouvement_id'));

            $laTransaction->save();
        }
        if($request->get('nbrMois') > 0){
            $request->session()->flash('success', 'Les ' . $request->get('nbrMois') . ' transactions ont été Ajouté !');
        }else{
            $request->session()->flash('success', 'La transaction à été Ajouté !');
        }
        
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
        $auth = Auth::user()->load('color')->load('comptes');
        $laTransaction = Transaction::find($id);

        return view('transaction.edit')
                        ->with('auth', $auth)
                        ->with("laTransaction", $laTransaction)
                        ->with('mouvement_id', $laTransaction->mouvement->id)
                        ->with('jours', $laTransaction->dte_previsionnel->day)
                        ->with('mois', $laTransaction->dte_previsionnel->month)
                        ->with('annee', $laTransaction->dte_previsionnel->year);
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

        $laTransaction->dte_effectif = Carbon::createFromFormat('d/m/Y', $request->get('dte_effectif'));
        $laTransaction->dte_previsionnel = Carbon::createFromFormat('d/m/Y', $request->get('dte_previsionnel'));
        $laTransaction->montant_effectif = $request->get('montant_effectif');
        $laTransaction->montant_previsionnel = $request->get('montant_previsionnel');

        $laTransaction->save();

        $request->session()->flash('success', 'La transaction à été Modifié !');
        return redirect()->route("compte.show", ['id' => $laTransaction->mouvement->compte->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $laTransaction = Transaction::find($id);
        $id_compte = $laTransaction->mouvement->compte->id;
        $laTransaction->delete();

        $request->session()->flash('success', 'La transaction à été Supprimé !');
        return redirect()->route("compte.show", ['id' => $id_compte]);
    }

}
