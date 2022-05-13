<?php

namespace App\Http\Controllers;

use App\Models\Universidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversidadeController extends Controller
{

    public function index() {
        $universidades = Http::get("http://universities.hipolabs.com/search?country=United+States", [
            'limit' => 100,
        ]);

        $universidades = $universidades->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
                ]
            ]);
        return response()->json([$universidades]);
    }
}
