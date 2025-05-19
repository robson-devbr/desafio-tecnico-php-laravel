<?php

namespace App\Interfaces\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validação dos dados enviados
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tenta autenticar o usuário com as credenciais
        if (Auth::attempt($request->only('email', 'password'))) {
            // Se autenticado, regenerar sessão para evitar fixação de sessão
            $request->session()->regenerate();

            // Redireciona para a rota home (dashboard)
            return redirect()->intended('/home');
        }

        // Se falhar a autenticação, volta para login com mensagem de erro
        return back()->withErrors([
            'email' => 'E-mail ou senha inválidos.',
        ])->withInput();
    }

    // Método logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}