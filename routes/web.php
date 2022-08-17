<?php

use App\Http\Controllers\ColaboradorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Models\Colaborador;

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

Route::resource("/empresa", EmpresaController::class);
Route::resource("/colaborador", ColaboradorController::class);

Route::get('/colaborador/create/{id_empresa}', function () {
    return view('colaboradores.create');
});

Route::get('/colaborador/{id_colaborador}', function () {
    return view('colaboradores.edit');
});

Route::get('/colaborador/create/{id_empresa}', function () {
    return view('colaboradores.create');
});

Route::post('/colaborador/create', [ColaboradorController::class, 'store']);


