<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UniversidadeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/login', LoginController::class);
Route::resource('/cadastro', CadastroController::class);
Route::resource('/universidade', UniversidadeController::class)->middleware('auth');
Route::resource('/universidade_user', UniversidadeUserController::class, [
    'names' => [
        'store' => 'inscrever-se',
    ],
])->middleware('auth');


