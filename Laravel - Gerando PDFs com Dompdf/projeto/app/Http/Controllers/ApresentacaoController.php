<?php

namespace App\Http\Controllers;

use PDF;

class ApresentacaoController
{

    // Repositóeio do DomPdf: https://github.com/barryvdh/laravel-dompdf
    
    public function olaMundo()
    {
        $domPdf = PDF::loadHTML('<h1 style="color:red;">Ola Mundo</h1>');


        return $domPdf->stream();
    }

    public function cursos()
    {
        $cursos = [
            'php' => [
                'nome' => 'curso de PHP',
                'versao' => 8  
            ],
            'java' => [
                'nome' => 'curso de Java',
                'versao' => 12  
            ]
        ];

        $domPdf = PDF::loadView('cursos', compact('cursos'));

        return $domPdf->stream();
    }

    public function wiki()
    {
        $domPdf = PDF::loadFile(public_path() . '\treinaweb-wiki.html');

        // return $domPdf->stream(); // mostra na tela o arquivo PDF
        // return $domPdf->download('treinaweb-wiki.pdf'); // ja faz o download do PDF
        // return $domPdf->save(public_path() . '\treinaweb-wiki.html')->stream('treinaweb-wiki.pdf'); // salvar no servidor e mostrar na tela
        return $domPdf
            ->setPaper('a4', 'landscape') //formato paisagem
            ->save(public_path() . '\treinaweb-wiki.html')
            ->stream();
    }
}

