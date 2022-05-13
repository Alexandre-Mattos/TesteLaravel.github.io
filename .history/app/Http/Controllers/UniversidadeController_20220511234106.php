<?php

namespace App\Http\Controllers;

use App\Models\Universidades;
use Illuminate\Http\Request;

class UniversidadeController extends Controller
{
    public function load() {
        $universidades = Universidades::get()->json('http://universities.hipolabs.com/search?country=United+States');
        return $universidades;
    }
}
