<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversidadeUserController extends Controller
{
    public function store (Request $request) {
        $data = $request->validate([
            'universidade_id' => 'required'
        ]);

        $user = auth()->user();
    }
}
