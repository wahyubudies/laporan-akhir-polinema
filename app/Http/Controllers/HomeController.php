<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        if($role == "admin"){
            return redirect()->route('refrensi-tema.index');
        } else if($role == "dosen"){
            return redirect()->route('refrensi-tema.index');
        } else {
            return redirect()->to('logout');
        }
        return redirect()->to('login');
    }
}
