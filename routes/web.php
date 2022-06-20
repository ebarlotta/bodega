<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgregadoController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\PiletaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\ChartController;


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

// Route::get('chart', 'ChartController@index');
// Route::get('chart', function () {
//     return view('user');
// });

Route::controller(ChartController::class)->group(function () {
    Route::get('chart', 'index');
});

Route::controller(ChartController::class)->group(function () {
    Route::get('seguimiento','index');
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('agregados', AgregadoController::class);
Route::resource('almacenes', AlmacenController::class);
Route::resource('piletas', PiletaController::class);
Route::resource('unidades', UnidadController::class);
Route::resource('analisis', AnalisisController::class);

