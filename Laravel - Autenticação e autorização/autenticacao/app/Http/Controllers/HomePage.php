<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePage extends Controller
{
    // como utilizar no controller com o método 'construct' o middleware auth 
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Mostra a página inicial do usuário logado
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function __invoke()
    {
        return view('home');
    }
}
