<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $role = Auth::user()->role;
        if($role == "admin"){
            return redirect()->to('admin'); }
        else if($role == "pembimbing") {
            return redirect()->to('pembimbing'); }
    }
}
