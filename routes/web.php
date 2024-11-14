<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\problem\problemController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/principal', [problemController::class, 'index'])->name('principal');
Route::get('/problem', [problemController::class, 'create'])->name('problem');

// Rutas Problema
Route::group(['scheme' => env('ROUTE_HTTPS')], function () {
    Route::get('/problem.list', [problemController::class, 'index'])->name('problem.list');
    Route::get('/problem.find', [problemController::class, 'show'])->name('problem.find');
    Route::get('/problem.new', [problemController::class, 'create'])->name('problem.new');
    Route::post('/problem.create', [problemController::class, 'store'])->name('problem.create');
    Route::get('/problem.edit/{id}', [problemController::class, 'edit'])->name('problem.edit');
    Route::post('/problem.update/{id}', [problemController::class, 'update'])->name('problem.update');
    Route::get('/problem.destroy/{id}', [problemController::class, 'destroy'])->name('problem.destroy');
});
