<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

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
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->session()->flash('success', 'L\'utilisateur à été Ajouté !');
        
        $colorItem = "";
        switch ($request->get('color')) {
            case "blue":
                $colorItem = "blue";
                break;
            case "yellow":
                $colorItem = "orange";
                break;
            case "green":
                $colorItem = "olive";
                break;
            case "purple":
                $colorItem = "purple";
                break;
            case "red":
                $colorItem = "maroon";
                break;
            case "black":
                $colorItem = "navy";
                break;
            default:
                $colorItem = "blue";
        }

        User::create([
            'pseudo' => $request->get('pseudo'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'avatar' => $request->get('avatar'),
            'color_theme' => $request->get('color'),
            'color_item' => $colorItem,
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

        return view('user.edit')
                        ->with("leUser", $leUser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $colorItem = "";
        switch ($request->get('color')) {
            case "blue":
                $colorItem = "blue";
                break;
            case "yellow":
                $colorItem = "orange";
                break;
            case "green":
                $colorItem = "olive";
                break;
            case "purple":
                $colorItem = "purple";
                break;
            case "red":
                $colorItem = "maroon";
                break;
            case "black":
                $colorItem = "navy";
                break;
            default:
                $colorItem = "blue";
        }

        $leUser = User::find($id);

        $leUser->pseudo = $request->get('pseudo');
        $leUser->nom = $request->get('nom');
        $leUser->prenom = $request->get('prenom');
        $leUser->email = $request->get('email');
        $leUser->avatar = $request->get('avatar');
        $leUser->color_theme = $request->get('color');
        $leUser->color_item = $colorItem;

        if ($request->get('password') != "") {
            $leUser->password = bcrypt($request->get('password'));
        }

        $leUser->save();

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
