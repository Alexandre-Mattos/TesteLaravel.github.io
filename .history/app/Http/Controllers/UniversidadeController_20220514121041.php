<?php

namespace App\Http\Controllers;

use App\Models\Universidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class UniversidadeController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    public function index(Request $request) {

        $dbUniversidades = Universidades::query();
        $count = $dbUniversidades->count();
        if($count === 0) {
            $request = Http::get("http://universities.hipolabs.com/search?country=United+States", [
                'limit' => 1,
            ]);

            $universidades = collect(json_decode($request->body()))->take(100);

            $universidades->each(function ($universidade) {
                Universidades::create([
                    'name'           => $universidade->name,
                    'country'        => $universidade->country,
                    'domains'        => $universidade->domains[0],
                    'web_pages'      => $universidade->web_pages[0],
                    'alpha_two_code' => $universidade->alpha_two_code,
                    ]);

            });
        }

        if($request->has('name') && ($request->input('name') != '' || $request->input('name') != null)) {
            $dbUniversidades = $dbUniversidades->where('name', 'like', '%'.$request->input('name').'%');
        }


        $dbUniversidades = $dbUniversidades->get();
        return view('searchUniversidades', compact('dbUniversidades'));
    }

    public function store (Request $request)
    {
        $dados = $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
            'alpha_two_code' => 'required|string',
            'domains' => 'required|string',
            'web_pages' => 'required|string',
        ]);

        $universidade = Universidades::create($dados);
        return view('searchUniversidades', compact('dbUniversidades'));
    }
}
