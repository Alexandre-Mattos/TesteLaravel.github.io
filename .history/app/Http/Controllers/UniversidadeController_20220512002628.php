<?php

namespace App\Http\Controllers;

use App\Models\Universidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversidadeController extends Controller
{

    public function index() {
        $request = Http::get("http://universities.hipolabs.com/search?country=United+States", [
            'limit' => 1,
        ]);

        $universidades = collect(json_decode($request->body()))->take(100);

        $novasUniversidadesCadastradas = collect();
        $universidades->each(function ($universidade) use ($novasUniversidadesCadastradas){
            dd($universidade['alpha_two_code']);
            //$novaUniversidade = Universidades::create($universidade);
            //$novasUniversidadesCadastradas->push($novaUniversidade);
        });
        return response()->json([$novasUniversidadesCadastradas]);
    }
}
