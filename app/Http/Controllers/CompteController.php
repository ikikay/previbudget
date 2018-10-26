<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Compte;

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
        $leUser = User::find(Auth::user()->id);

        $lesComptes = $leUser->comptes;

        return view('compte.index')
                        ->with('tab_comptes', $lesComptes);
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
        $request->session()->flash('success', 'Le compte à été Ajouté !');

        $leUser = User::find(Auth::user()->id);

        $leCompte = new Compte();
        $leCompte->libelle = $request->get('libelle');
        $leCompte->user()->associate($leUser);

        $leCompte->save();

        return redirect()->route("compte.index");
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
        $request->session()->flash('success', 'Le compte à été Modifié !');

        $leCompte = Compte::find($id);

        $leCompte->update($request->all());

        return redirect()->route("compte.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $request->session()->flash('success', 'Le compte à été Supprimé !');

        $leCompte = Compte::find($id);

        $leCompte->delete();

        return redirect()->route("compte.index");
    }

}
