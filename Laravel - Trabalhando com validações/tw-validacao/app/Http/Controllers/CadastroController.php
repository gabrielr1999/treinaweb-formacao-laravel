<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CadastroController extends Controller
{
    // Essa é uma forma de simplificação diretamente na request
    public function store(CursoRequest $request)
    {
        // A validação agora é feito com Form Request

        //    $request->validate([ 
        //         "curso" => ['required', 'max:100'],
        //         "carga" => ['required', 'integer']
        //    ]);

        dd('cheguei aqui');
    }

    /* 
    Aqui foi a primeira forma de validar os dados

    public function store(Request $request)
    {
        $dados = $request->except('_token');

        $validacao = Validator::make($dados,
            // Definição das regras
            [
                "curso" => ['required', 'max:100'],
                "carga" => ['required', 'integer']
            ]
        )->validate();

        // $validacao->fails(); // se falhou vai retornar "true" se nao "false"

        // Com o "validate()" ja faz isso tudo embaixo. Nesse caso poderia mandar algum email ou algum log...
        // if($validacao->fails()){
        //     return redirect()->back()->withInput()->withErrors($validacao);
        // }
        dd('cheguei aqui');
    }
    */

    // Como validar os dados que são enviados no corpo da requisição utilizando o formato JSon
    public function storeAPI(Request $request)
    {
        $dados = $request->all();

        $validacao = Validator::make(
            $dados,
            [
                "curso" => ['required', 'max:100'],
                "carga" => ['required', 'integer']
            ]
        );

        if($validacao->fails()){
            $erros = $validacao->errors();

            return $erros->all();
        }

        dd('passou na validação');
    }
}
