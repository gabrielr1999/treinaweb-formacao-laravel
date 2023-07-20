<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Mostrar o formulário de cadastro de usuários
     * Retorna a view do cadastro de usuário
     *
     * @return void
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Realiza a criação do usuário no banco de dados
     * 1° valida os campos de usuário / 2° pegar as informações e coloca em uma variável / 3° ja passa o password com hash / 4° cria o usuário no banco
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $dados = $request->only(['name', 'email', 'password']);
        $dados['password'] = Hash::make($dados['password']);

        User::create($dados);

        return redirect()->route('home');
    }
}
