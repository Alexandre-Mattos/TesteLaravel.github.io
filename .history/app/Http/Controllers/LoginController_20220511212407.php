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
        $dados = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $dados['email'])
            ->where('password', $dados['password'])
            ->first();
        if($user) {
            Auth::attempt($dados);
            return view('welcome');
        }

        return view('login')->with('error', 'Usuário ou senha incorretos!');

    }
}
