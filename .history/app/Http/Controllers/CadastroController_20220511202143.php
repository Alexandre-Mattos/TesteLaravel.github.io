<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function store( Request $request ) {
        $user = User::create($request->toArray());

    }
}
