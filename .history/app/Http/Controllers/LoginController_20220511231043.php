<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');

    }

    public function store( Request $request ) {
        // Validação dos dados passados
        $dados = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // Encontra o usuario no qual o email e senha coincidem
        $user = User::where('email', $dados['email'])
            ->where('password', $dados['password'])
            ->first();

        // Se o usuario for encontrado ele sera autenticado
        if($user) {
            Auth::attempt($dados);
            return view('welcome');
        }

        return response()->json([
            'error' => 'Usuário ou senha incorretos'
        ], 401);

    }
}
