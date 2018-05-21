<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        return view('home');
    }
    public function Foto()
    {
        return view('Foto');
    }
    public function perfil()
    {
        return view('perfil');
    }
    public function CrearTorneo(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('CrearTorneo');
    }
    public function Changepwd()
    {
        return view('Changepwd');
    }
    public function welcome()
{
        return view('welcome');
    }
}
