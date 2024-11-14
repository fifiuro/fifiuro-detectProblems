<?php

use App\Http\Controllers\comments\commentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\problem\problemController;
use App\Http\Controllers\users\usersController;

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

Route::group(['scheme' => env('ROUTE_HTTPS')], function () {
    // Rutas Problema
    Route::get('/problem.list', [problemController::class, 'index'])->name('problem.list');
    Route::get('/problem.find', [problemController::class, 'show'])->name('problem.find');
    Route::get('/problem.new', [problemController::class, 'create'])->name('problem.new');
    Route::post('/problem.create', [problemController::class, 'store'])->name('problem.create');
    Route::get('/problem.edit/{id}', [problemController::class, 'edit'])->name('problem.edit');
    Route::post('/problem.update/{id}', [problemController::class, 'update'])->name('problem.update');
    Route::get('/problem.destroy/{id}', [problemController::class, 'destroy'])->name('problem.destroy');
    // Rutas de comentarios
    Route::get('/comments.list/{problem_id}', [commentsController::class, 'index'])->name('comments.list');
    Route::get('/comments.new/{problem_id}', [commentsController::class, 'create'])->name('comments.new');
    Route::post('/comments.create', [commentsController::class, 'store'])->name('comments.create');
    Route::get('/comments.edit/{id}', [commentsController::class, 'edit'])->name('comments.edit');
    Route::post('/comments.update/{id}', [commentsController::class, 'update'])->name('comments.update');
    Route::get('/comments.destroy/{id}/{problem_id}', [commentsController::class, 'destroy'])->name('comments.destroy');
    // Rutas de Usuarios
    Route::get('/users.list', [usersController::class, 'index'])->name('users.list');
    Route::get('/users.find', [usersController::class, 'show'])->name('users.find');
    Route::get('/users.new', [usersController::class, 'create'])->name('users.new');
    Route::post('/users.create', [usersController::class, 'store'])->name('users.create');
    Route::get('/users.edit/{id}', [usersController::class, 'edit'])->name('users.edit');
    Route::post('/users.update/{id}', [usersController::class, 'update'])->name('users.update');
    Route::get('/users.destroy/{id}', [usersController::class, 'destroy'])->name('users.destroy');
});
