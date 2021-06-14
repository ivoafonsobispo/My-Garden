<!-- Controller de autentificação do login -->

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // função que envia para o login
    public function index()
    {
        return view("auth.login");
    }

    // função que autentifica o login
    public function authenticate(Request $request)
    {
        // cria a variavel credenciais e valia-as
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // se forem as corretas envia para a dashboard
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // caso contrario apresenta mensagem de erro
        return back()->withErrors([
            'failed' => 'As credenciais fornecidas não estão corretas.',
        ]);
    }

    // função para realizar o logout da conta
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
