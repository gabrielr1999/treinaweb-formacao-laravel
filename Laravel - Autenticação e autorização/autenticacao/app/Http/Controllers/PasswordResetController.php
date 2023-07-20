<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    /**
     * Mostra o formulário para requisitar mensagem de recuperação de senha
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function request()
    {
        return view('auth.passwords.email');
    }

    /**
     * Envia a mensagem de email para o endereço do usuário
     * 1° valida se o email existe e se ele e um padrão 'email' / 2° usa da classe Password o método 'sendResetLink' passando o email, se dando certo, ele pega o status / 3°
     * se der certo esse status ele redireciona com o status se não ele redireciona passando o erro com o campo email dentro da classe status
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function email(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Mostra o dorm de alteração da senha
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function reset()
    {
        return view('auth.passwords.reset');
    }

    /**
     * 
     * 1° valida toos os dados / 2° usa o método reset da classe Password, recebendo os dados e em seguida recebe uma função que vai fazer uma alteração que 
     * pega o usuário e a senha, pega o usuario e preenche a senha com Hash e definir o 'setRememberToken' com esse valor, salva os dados que foi definido e vai no 
     * evento e define que a senha foi resetada / 3° depois ele vai comparar se deu certo, se deu certo redireciona para o login passando o status s enão redireciona um erro
     * no campo email passando o status
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );


        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}