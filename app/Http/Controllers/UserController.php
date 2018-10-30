<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Color;

class UserController extends Controller {

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
        $lesUsers = User::all();

        return view('user.index')
                        ->with('auth', $auth)
                        ->with('tab_users', $lesUsers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $auth = Auth::user()->load('color');
        $leUser = new User();
        $lesCouleurs = Color::all();

        return view('user.create')
                        ->with('auth', $auth)
                        ->with("leUser", $leUser)
                        ->with("lesCouleurs", $lesCouleurs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, User::$rulesOnCreate);

        $leUser = new User();

        $leUser->pseudo = $request->get('pseudo');
        $leUser->nom = $request->get('nom');
        $leUser->prenom = $request->get('prenom');
        $leUser->email = $request->get('email');
        $leUser->password = bcrypt($request->get('password'));
        $leUser->avatar = $request->get('avatar');
        $leUser->color()->associate($request->get('color_id'));

        $leUser->save();

        $request->session()->flash('success', 'L\'utilisateur à été Ajouté !');
        return redirect()->route("user.index");
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
        $leUser = User::with('color')->find($id);
        $lesCouleurs = Color::all();

        return view('user.edit')
                        ->with('auth', $auth)
                        ->with("leUser", $leUser)
                        ->with("lesCouleurs", $lesCouleurs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, User::$rulesOnUpdate);

        $leUser = User::find($id);

        if ($request->get('password') != "") {
            $leUser->password = bcrypt($request->get('password'));
        }

        $leUser->update($request->except(['password']));

        $request->session()->flash('success', 'L\'utilisateur à été Modifié !');
        return redirect()->route("user.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $leUser = User::find($id);

        $leUser->delete();

        $request->session()->flash('success', 'L\'utilisateur à été Supprimé !');
        return redirect()->route("user.index");
    }

}
