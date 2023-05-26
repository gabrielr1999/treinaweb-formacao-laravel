<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class SiteComponenteController extends Controller
{
    public function home(string $idioma = 'pt_BR')
    {
        App::setLocale($idioma);

        return view('componente.home');
    }

    public function portfolio()
    {
        return view('componente.portfolio', [
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
        return view('componente.sobre');
    }

    public function contato()
    {
        return view('componente.contato');
    }
}