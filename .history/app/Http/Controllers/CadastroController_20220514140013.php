<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    public function index() {
        return view('cadastro');
    }

    public function show ($id) {
        $user = User::findOrFail($id);
        return view('profile')
            ->with('user', UserResource::make($user));
    }

    public function store( Request $request ) {
        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);

        $user = User::create($dados);
        return view('login')->with('success', "Cadastro do $user->name realizado com sucesso!");
    }
}
