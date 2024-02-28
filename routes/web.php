<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FormularioController::class, 'create']);
Route::post('/generar-word', [FormularioController::class, 'generarWord']);
Route::get('/seleccionar-form', [FormularioController::class, 'showSelectionForm'])->name('formulario.select');

Route::get('/formulario1', [FormularioController::class, 'showFormulario1'])->name('formulario.formulario1');
Route::get('/formulario2', [FormularioController::class, 'showFormulario2'])->name('formulario.formulario2');
Route::get('/formulario3', [FormularioController::class, 'showFormulario3'])->name('formulario.formulario3');
Route::get('/formulario4', [FormularioController::class, 'showFormulario4'])->name('formulario.formulario4');