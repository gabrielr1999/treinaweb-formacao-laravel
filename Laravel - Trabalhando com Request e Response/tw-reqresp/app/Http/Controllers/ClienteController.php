<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteController extends Controller
{
    // ::::::::: trabalhando com redirecionamento ::::::::::
    public function index()
    {
        // return redirect()->away('https://google.com');
        return redirect()->route('clientes.create');
    }

    // ::::::::: respondendo arquivos ::::::::::
    // public function index()
    // {
        // return response()->download( // faz o download
    //     return response()->file( // abre direto a imagem
    //         storage_path('app/public/foto.jpg')
    //     );
    // }

    // ::::::::: response :::::::::::
    // public function index(Response $response)
    // {
        // conhecendo a classe Response

        // return $response->setContent('<h1>Olá mundo</h1>')
        //                 ->setStatusCode(200)
        //                 ->header('Content-Type', 'text/html');

        // return response('<h1>Olá mundo</h1>');
        
        // return '<h1>Olá mundo</h1>';
        
        // ------------------------------------------------------------------------

        // Respondendo json

        // $clientes = [
        //     "Joao" => ['nome' => 'João da Silva'],
        //     "Maria" => ['nome' => 'Maria da Silva']
        // ];

        // $dadosString = json_encode($clientes);

        // return $response->setContent($dadosString)
        //                 ->header('Content-Type', 'application/json')
        //                 ->setStatusCode(200);
        
        // return  response()->json($clientes);

        // return response()->json($clientes, 200, []);

        // melhor forma de retornar, somente essa
    //     return $clientes;

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // echo request()->path();
        // dd(request()->is('clientes/create'))
        // dd(request()->url())
        // dd(request()->fullUrl())
        // dd(request()->method())
        // dd(request()->isMethod('POST'))
        // dd(request()->header())

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // :::: REQUEST :::::

        //input = permite q obtenha valores, valores enviados a partir de um formulário ou url
        // dd($request->input('nome', 'nome não definido'));

        //outra forma mais simples para pegar os dados
        // dd($request->nome); 

        // Obtem todos os dados da request e retorna no formato de array
        // dd($request->all());
        
        // Obtem todos os dados da request, retorna no formato de array e retira um campo que eu não queira
        // dd($request->except('_token')); 

        //// Obtem todos os dados da request, retorna no formato de array e pega o(s) campo(s) que eu quero
        // dd($request->only('nome','idade')); 

        // É parecido com o input mas o query pega os dados por query string (url) 
        // dd($request->query()); 

        // verifica se existe o campo nome
        // if($request->has('nome')) {
        //     dd('existe o campo nome');
        // }
        // dd('não existe o campo nome');

        // verifica se o campo nome foi preenchido
        // if($request->filled(['nome', 'idade'])) {
        //     dd('o campo nome e idade tem valor');
        // }
        // dd('o campo nome e idade não tem valor');

        // pega o dado do tipo file
        // dd($request->file('foto'));
        // dd($request->foto->path());
        // dd($request->foto->extension());

        // salva no storage do Laravel a imagem e é preciso criar uma url simbólica para acessar via url essa imagem no navegador (documentação)
        // dd($request->foto->store('public'));

        return redirect()->route('clientes.create')->with('mensagem', 'Cliente criado com sucesso!');
    }
}


//  ---------------- O que é Response -------------------
// Quando um cliente faz uma requisição para o servidor, consequentemente ele espera uma resposta. A resposta deve conter todas as informações para que o cliente possa saber exatamente o que aconteceu com o pedido que ele realizou.

// As informações mais importantes da response são:
// ° Código de status – Informa de modo geral o que aconteceu com aquela requisição;
// ° Tipo de conteúdo – Informa para o cliente o que estamos devolvendo para ele saber como tratar;
// ° Conteúdo – O conteúdo devolvido.

// É importante sempre enviar a resposta corretamente para o cliente. Mesmo que ocorra um erro em nossa aplicação, ele não tenha acesso ao recurso disponibilizado, o recurso que ele está tentando acessar não existe; precisamos responder isso para ele.

