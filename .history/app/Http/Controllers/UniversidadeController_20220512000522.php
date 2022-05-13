<?php

namespace App\Http\Controllers;

use App\Models\Universidades;
use Illuminate\Http\Request;

class UniversidadeController extends Controller
{
    use GuzzleHttp;

    public function index() {
        $universidades = new Universidades();
        $url = "http://universities.hipolabs.com/search?country=United+States";

        $universidades = $universidades->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
                ]
            ]);
        return response()->json([$universidades]);
    }
}
