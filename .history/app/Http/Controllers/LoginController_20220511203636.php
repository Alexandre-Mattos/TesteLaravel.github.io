<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');

    }

    public function store( Request $request ) {
        $dados = $request->validate([
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        Auth::attempt($dados);
    }
}
