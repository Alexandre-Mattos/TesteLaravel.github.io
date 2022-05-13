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

        $universidades->each(function ($universidade) {
            $novaUniversidade                 = Universidades::make();
            $novaUniversidade->name           = $universidade->name;
            $novaUniversidade->country        = $universidade->country;
            $novaUniversidade->domains        = $universidade->domains;
            $novaUniversidade->web_pages      = $universidade->web_pages;
            $novaUniversidade->alpha_two_code = $universidade->alpha_two_code;
            $novaUniversidade->save();

        });
        return response()->json([$universidades]);
    }
}
