<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UniversidadeController;
use App\Http\Controllers\UniversidadeUserController;
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
    return view('login');
});

Route::get('/login', LoginController::class . '@index')->name('login');
Route::post('/login', LoginController::class . '@store');
Route::resource('/cadastro', CadastroController::class);
Route::resource('/universidade', UniversidadeController::class);
Route::resource('/universidade-cadastro', function() {
    return view('universidade-cadastro');
});

Route::resource('/universidade_user', UniversidadeUserController::class);


