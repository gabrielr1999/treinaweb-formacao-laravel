<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View as ViewView;

class ClientController extends Controller
{
    /**
     * Lista os clientes
     *
     * @return ViewView
     */
    public function index(): ViewView
    {
        $clients = Client::get();

        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    /**
     * Mostra um cliente específico
     *
     * @param [type] $id
     * @return ViewView
     */
    public function show($id): ViewView
    {
        $client = Client::find($id);

        return view('clients.show', [
            'client' => $client
        ]);
    }

    /**
     * Exibe o formulario de criação
     *
     * @return ViewView
     */
    public function create(): ViewView
    {
        return view('clients.create');
    }

    /**
     * Cria um cliente no banco de dados
     *
     * @param Request $resquest
     * @return RedirectResponse
     */
    public function store(Request $resquest): RedirectResponse
    {
        // dd($resquest->all());
        $dados = $resquest->except('_token');

        Client::create($dados);

        return redirect('/clients');

    }

    /**
     * Mostra formulario para edição
     *
     * @param integer $id
     * @return ViewView
     */
    public function edit(int $id): ViewView
    {
        $client = Client::find($id);

        return view('clients.edit', ['client' => $client]);

    }

    /**
     * Atualiza o cliente no banco de dados
     *
     * @param integer $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(int $id, Request $request): RedirectResponse
    {
        $client = Client::find($id);

        $client->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'observacao' => $request->observacao
        ]);

        return redirect('/clients');
    }

    /**
     * Apaga um cliente no banco de dados
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $client = Client::find($id);

        $client->delete();

        return redirect('/clients');
    }
}
