<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteHerancaController;
use App\Http\Controllers\SiteComponenteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/site/heranca', [SiteHerancaController::class, 'home'])->name('site.heranca.home');
Route::get('/site/heranca/portfolio', [SiteHerancaController::class, 'portfolio'])->name('site.heranca.portfolio');
Route::get('/site/heranca/sobre', [SiteHerancaController::class, 'sobre'])->name('site.heranca.sobre');
Route::get('/site/heranca/contato', [SiteHerancaController::class, 'contato'])->name('site.heranca.contato');

Route::get('/site/componente/home/{idioma?}', [SiteComponenteController::class, 'home'])->name('site.componente.home');
Route::get('/site/componente/portfolio', [SiteComponenteController::class, 'portfolio'])->name('site.componente.portfolio');
Route::get('/site/componente/sobre', [SiteComponenteController::class, 'sobre'])->name('site.componente.sobre');
Route::get('/site/componente/contato', [SiteComponenteController::class, 'contato'])->name('site.componente.contato');


Route::get('/', function () {
    return view('index', [
        // 'paginacao' => false, testar quando esta utilizando o includeWhen
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
});

Route::get('/passagem/dados', function () {
    return view('exemplos.passagem_dados', [
        'nome' => 'Treinaweb',
        'descricao' => 'Escola de desenvolvimento'
    ]);
});

Route::get('/exibicao/json', function () {
    return view('exemplos.exibicao_json', [
        'posts' => [
            [
                'titulo' => 'Novidade do Laravel',
                'Conteudo' => 'Nesta versão o Laravel...'
            ],
            [
                'titulo' => 'Novidade do Blade',
                'Conteudo' => 'Nesta versão o Blade...'
            ]
        ]
    ]);
});

Route::get('/frameworks/js', function () {
    return view('exemplos.frameworks_js');
});

Route::get('/php/comentarios', function () {
    return view('exemplos.php_comentarios');
});

Route::get('/condicional/if', function () {
    return view('exemplos.condicional_if', [
        'comentarios' => -1
    ]);
});

Route::get('/condicional/switch', function () {
    return view('exemplos.condicional_switch', [
        'mes' => null
    ]);
});
