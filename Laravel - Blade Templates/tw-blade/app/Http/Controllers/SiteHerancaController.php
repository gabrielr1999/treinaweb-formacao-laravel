<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteHerancaController extends Controller
{
    public function home()
    {
        return view('heranca.home');
    }

    public function portfolio()
    {
        return view('heranca.portfolio', [
            'projetos' => [
                [
                    'ativo' => true,
                    'imagem' => 'cabin.png'
                ],
                [
                    'ativo' => true,
                    'imagem' => 'cake.png'
                ],
                [
                    'ativo' => true,
                    'imagem' => 'circus.png'
                ],
                [
                    'ativo' => false,
                    'imagem' => 'game.png'
                ],
                [
                    'ativo' => true,
                    'imagem' => 'safe.png'
                ],            
                [
                    'ativo' => true,
                    'imagem' => 'submarine.png'
                ],
            ]
        ]);
    }

    public function sobre()
    {
        return view('heranca.sobre');
    }

    public function contato()
    {
        return view('heranca.contato');
    }
}