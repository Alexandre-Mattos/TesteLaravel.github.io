<?php

namespace App\Http\Controllers;

use App\Models\Universidades;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UniversidadeUserController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    }
 */

    public function index()
    {
        return view('searchUniversidades')
            ->with('universidades', Universidades::all());
    }

    public function show (Request $request) {


    }

    public function store (Request $request) {
        $data = $request->validate([
            'universidade_id' => 'required'
        ]);

        dd($data['universidade_id']);
        $user = User::findOrFail(auth()->user()->id);
        $universidade = Universidades::findOrFail($data['universidade_id']);

        $user->universidades()->attach($universidade);

        return view('searchUniversidades')
        ->with('dbUniversidades', Universidades::all());;

    }

    public function destroy ($universidadeId) {
        $user = User::findOrFail(auth()->user()->id);
        $user->universidades()->detach($universidadeId);

        return view('searchUniversidades')
        ->with('dbUniversidades', Universidades::all());;

    }
}
