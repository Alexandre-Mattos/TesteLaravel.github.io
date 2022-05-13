<?php

namespace App\Http\Controllers;

use App\Models\Universidades;
use Illuminate\Http\Request;

class UniversidadeUserController extends Controller
{
    public function index()
    {
        return view('searchUniversidades')
            ->with('universidades', Universidades::all());
    }

    public function store (Request $request) {
        $data = $request->validate([
            'universidade_id' => 'required'
        ]);

        $user = auth()->user();
        $universidade = Universidades::findOrFail($data['universidade_id']);

        $user->universidades()->attach($universidade);

        return view('welcome');

    }
}
