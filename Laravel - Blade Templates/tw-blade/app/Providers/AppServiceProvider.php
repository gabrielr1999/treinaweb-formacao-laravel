<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.layout', function($view) {
            $view->with('itensMenu', [
                [
                    'descricao' => 'Portfolio',
                    'link' => route('site.componente.portfolio')
                ],
                [
                    'descricao' => 'Sobre',
                    'link' => route('site.componente.sobre')
                ],
                [
                    'descricao' => 'Contato',
                    'link' => route('site.componente.contato')
                ]
            ]);
        });

        View::composer('heranca.layout', function($view) {
            $view->with('itensMenu', [
                [
                    'descricao' => 'Portfolio',
                    'link' => route('site.heranca.portfolio')
                ],
                [
                    'descricao' => 'Sobre',
                    'link' => route('site.heranca.sobre')
                ],
                [
                    'descricao' => 'Contato',
                    'link' => route('site.heranca.contato')
                ]
            ]);
        });
    }
}