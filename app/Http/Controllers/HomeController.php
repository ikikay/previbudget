<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return redirect()->route('dashboard');
    }

    public function toDashboard() {
        $auth = Auth::user()->load('color')->load('comptes');

        return view('dashboard')
                        ->with('auth', $auth);
    }

}
