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
        $lesComptes = Compte::where('user_id', "=", Auth::user()->id)->get();

        return view('compte.index')
                        ->with('tab_comptes', $lesComptes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('compte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->session()->flash('success', 'Le compte à été Ajouté !');

        //$leUser = User::find($request->get('idUser'));
        $leCompte = new Compte();
        $leCompte->user_id = $request->get('user_id');
        $leCompte->libelle = $request->get('libelle');
        
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
        $leCompte = User::find($id);

        $leCompte->libelle = $request->get('libelle');

        $leCompte->save();

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
