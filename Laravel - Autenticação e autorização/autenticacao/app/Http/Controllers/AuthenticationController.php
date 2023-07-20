<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Mostra o formulário de login
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Realiza login com os dados enviados
     * 1° valida os campos email e senha em forma de array / 2° utiliza o método attempt para verificar se meus dados estão corretos e ja passa o campo 'remember', 
     * se a autenticação der certo vai guardar sentro da sessão os dados do usuário autenticado, por boa prática usa o método 'regenerate' e  redireciona para a 
     * pagina anterior que entrou ou para home / 4° se não retorna um erro no formulário
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logar(Request $request)
    {
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($dados, $request->filled('remember'))){
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'O email e/ou senha não são válidos'
        ]);
    }

    /**
     * Realiza o logou do usuário
     * 1° chama o Auth::logout para o Laravel saber que está delogando / 2° da um invalidate na session / 3° regerateToken para ele gerar novamente o token CSRF / 4° redireciona
     * para página inicial
     * 
     * 
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate(); //invalidar a sessão
        $request->session()->regenerateToken(); //invalidar o token CSRF

        return redirect('/');
    }
}
