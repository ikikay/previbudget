<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
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
        $lesComptes = Compte::with('user')->where('user_id', Auth::user()->id)->get();

        return view('compte.index')
                        ->with('lesComptes', $lesComptes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $leCompte = new Compte();

        return view('compte.create')
                        ->with("leCompte", $leCompte);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, Compte::$rules);

        $leUser = User::find(Auth::user()->id);

        $leCompte = new Compte();
        $leCompte->libelle = $request->get('libelle');
        $leCompte->user()->associate($leUser);

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
        $leCompte = Compte::with('mouvements', 'mouvements.transactions')->find($id);
        $actualMonth = new Carbon();
        $actualMonth->setLocale('fr');
        $actualMonth->firstOfMonth();
        
        return view('compte.show')
                        ->with("leCompte", $leCompte)
                        ->with("actualMonth", $actualMonth);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $leCompte = Compte::find($id);

        return view('compte.edit')
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
