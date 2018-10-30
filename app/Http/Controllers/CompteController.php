<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Compte;
use Carbon\Carbon;

class CompteController extends Controller {

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
        $auth = Auth::user()->load('color');
        $lesComptes = Compte::where('user_id', $auth->id)->get();

        return view('compte.index')
                        ->with('auth', $auth)
                        ->with('lesComptes', $lesComptes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $auth = Auth::user()->load('color');
        $leCompte = new Compte();

        return view('compte.create')
                        ->with('auth', $auth)
                        ->with("leCompte", $leCompte);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $auth = Auth::user()->load('color');
        $this->validate($request, Compte::$rules);

        $leCompte = new Compte();
        $leCompte->libelle = $request->get('libelle');
        $leCompte->user()->associate($auth->id);

        $leCompte->save();

        $request->session()->flash('success', 'Le compte à été Ajouté !');
        return redirect()->route("compte.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $auth = Auth::user()->load('color');
        $leCompte = Compte::with('mouvements', 'mouvements.transactions')->find($id);
        $leCompte->mouvements->sortBy('depense_id');
        $lesMouvementsRevenus = $leCompte->mouvements->where('depense_id', 1)->sortBy("libelle");
        $lesMouvementsDepensesFixes = $leCompte->mouvements->where('depense_id', 2)->sortBy("libelle");
        $lesMouvementsDepensesVariables = $leCompte->mouvements->where('depense_id', 3)->sortBy("libelle");
        $lesMouvementsDepensesOccasionnelles = $leCompte->mouvements->where('depense_id', 4)->sortBy("libelle");
        $actualMonth = new Carbon();
        $actualMonth->setLocale('fr');
        $actualMonth->firstOfMonth();

        return view('compte.show')
                        ->with('auth', $auth)
                        ->with("actualMonth", $actualMonth)
                        ->with("leCompte", $leCompte)
                        ->with("lesMouvementsRevenus", $lesMouvementsRevenus)
                        ->with("lesMouvementsDepensesFixes", $lesMouvementsDepensesFixes)
                        ->with("lesMouvementsDepensesVariables", $lesMouvementsDepensesVariables)
                        ->with("lesMouvementsDepensesOccasionnelles", $lesMouvementsDepensesOccasionnelles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $auth = Auth::user()->load('color');
        $leCompte = Compte::find($id);

        return view('compte.edit')
                        ->with('auth', $auth)
                        ->with("leCompte", $leCompte);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, Compte::$rules);

        $leCompte = Compte::find($id);

        $leCompte->update($request->all());

        $request->session()->flash('success', 'Le compte à été Modifié !');
        return redirect()->route("compte.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $leCompte = Compte::find($id);

        $leCompte->delete();

        $request->session()->flash('success', 'Le compte à été Supprimé !');
        return redirect()->route("compte.index");
    }

}
