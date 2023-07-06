<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    // public function listar(Request $request)
    public function listar() // sem request ois está utilizando o helper session
    {
        // $produto = $request->session()->get('produto', 'Produto não encontrado');

        $produto = session('produto', 'Produto não encontrado'); // listando com helper session
        $total = session('total', 'Nenhum item adicionado'); // listando com helper session

        // var_dump($produto, $total);
        var_dump(session()->all());
    }

    public function adicionar(Request $request)
    // public function adicionar() // sem request ois está utilizando o helper session
    {
        // $request->session()->put('produto', 'Boneca');

        // session(['produto' => 'bola']); // adicionando com helper session
        // session(['total' => 'R$ 123,00']); // adicionando com helper session

        if($request->session()->missing('produtos')){ // se não tiver uma chave "produtos", eu crio uma vazia. Se tiver passa direto
            $request->session()->put('produtos', []);
        }

        $request->session()->push('produtos', $request->produto); //pega da url um parâmetro e esse parâmetro pega via request 

        return 'adicionado com sucesso';
    }

    public function remover(Request $request)
    // public function remover() // sem request ois está utilizando o helper session
    {
        // $request->session()->forget(['produto', 'total']);
        // $request->session()->flush();

        if($request->session()->has('produtos')){
            session()->forget(['produtos']); // removendo com helper session
            return 'O carrinho foi limpo com sucesso.';
        }

        return 'Não removeu nenhum item porque não tinha nenhum produto';
    }
}
