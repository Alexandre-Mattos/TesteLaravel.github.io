<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function store( Request $request ) {
        $user = User::create($request->toArray());
        return redirect()->route('login');
    }
}
