<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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
        $lesUsers = User::all();

        return view('user.index')
                        ->with('tab_users', $lesUsers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $leUser = new User();
        $lesCouleurs = Color::all();

        return view('user.create')
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

        $request->session()->flash('success', 'L\'utilisateur à été Ajouté !');

        User::create([
            'pseudo' => $request->get('pseudo'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'avatar' => $request->get('avatar'),
            'color_id' => $request->get('color_id'),
        ]);

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
        $leUser = User::find($id);

        $lesCouleurs = Color::all();

        return view('user.edit')
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

        $request->session()->flash('success', 'L\'utilisateur à été Modifié !');

        $leUser = User::find($id);

        if ($request->get('password') != "") {
            $leUser->password = bcrypt($request->get('password'));
        }

        $leUser->update($request->except(['password']));

        return redirect()->route("user.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $request->session()->flash('success', 'L\'utilisateur à été Supprimé !');

        $leUser = User::find($id);

        $leUser->delete();

        return redirect()->route("user.index");
    }

}
