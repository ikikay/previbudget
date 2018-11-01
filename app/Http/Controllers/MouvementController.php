<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Mouvement;

class MouvementController extends Controller {

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
        $auth = Auth::user()->load('color');

        $leMouvement = new Mouvement();
        $lesDepenses = Depense::all();

        return view('mouvement.create')
                        ->with('auth', $auth)
                        ->with("lesDepenses", $lesDepenses)
                        ->with("leMouvement", $leMouvement)
                        ->with("compte_id", $request->get('compte_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, Mouvement::$rules);

        $leMouvement = new Mouvement();
        $leMouvement->libelle = $request->get('libelle');
        $leMouvement->depense()->associate($request->get('depense_id'));
        $leMouvement->compte()->associate($request->get('compte_id'));

        $leMouvement->save();

        $request->session()->flash('success', 'Le mouvement à été Ajouté !');
        return redirect()->route("compte.show", ['id' => $leMouvement->compte->id]);
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
    public function edit(Request $request, $id) {
        $auth = Auth::user()->load('color');

        $leMouvement = Mouvement::find($id);
        $lesDepenses = Depense::all();

        return view('mouvement.edit')
                        ->with('auth', $auth)
                        ->with("lesDepenses", $lesDepenses)
                        ->with("leMouvement", $leMouvement)
                        ->with("compte_id", $request->get('compte_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, Mouvement::$rules);

        $leMouvement = Mouvement::find($id);
        $leMouvement->libelle = $request->get('libelle');
        $leMouvement->depense()->associate($request->get('depense_id'));

        $leMouvement->save();

        $request->session()->flash('success', 'Le mouvement à été Modifié !');
        return redirect()->route("compte.show", ['id' => $leMouvement->compte->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $leMouvement = Mouvement::find($id);
        $id_compte  = $leMouvement->compte->id;
        $leMouvement->delete();

        $request->session()->flash('success', 'Le mouvement à été Supprimé !');
        return redirect()->route("compte.show", ['id' => $id_compte]);
    }

}
