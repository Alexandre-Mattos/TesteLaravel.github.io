<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    public function index() {
        return view('cadastro');
    }

    public function store( Request $request ) {
        $dados = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|',
        ]);
        dd($dados);
        return view('login');
    }
}
