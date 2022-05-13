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
            dd($universidade);
            Universidades::create([
                'name' => $universidade->name,
                'alpha_two_code' => $universidade->alpha_two_code,
                'country' => $universidade->country,
                'domains' => $universidade->domains,
                'web_pages' => $universidade->web_pages,
                ]);

        });
        return response()->json([
            'success' => 'Universidades importadas com sucesso!']);
    }
}
