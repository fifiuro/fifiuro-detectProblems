<?php

use App\Http\Controllers\comments\commentsController;
use App\Http\Controllers\firstPage\firstPageController;
use App\Http\Controllers\photos\photosController;
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

Auth::routes(['register' => false]);

Route::group(['scheme' => env('ROUTE_HTTPS')], function () {
    // Ruta Principal
    Route::get('/', [firstPageController::class, 'index'])->name('first.page')->middleware(['auth']);
    Route::get('/find', [firstPageController::class, 'show'])->name('find')->middleware(['auth']);
    // Rutas Problema
    Route::get('/problem.list', [problemController::class, 'index'])->name('problem.list')->middleware(['auth']);
    Route::get('/problem.find', [problemController::class, 'show'])->name('problem.find')->middleware(['auth']);
    Route::get('/problem.new', [problemController::class, 'create'])->name('problem.new')->middleware(['auth']);
    Route::post('/problem.create', [problemController::class, 'store'])->name('problem.create')->middleware(['auth']);
    Route::get('/problem.edit/{id}', [problemController::class, 'edit'])->name('problem.edit')->middleware(['auth']);
    Route::post('/problem.update/{id}', [problemController::class, 'update'])->name('problem.update')->middleware(['auth']);
    Route::get('/problem.destroy/{id}', [problemController::class, 'destroy'])->name('problem.destroy')->middleware(['auth']);
    Route::get('/problem.preview/{id}', [problemController::class, 'preview'])->name('problem.preview')->middleware(['auth']);
    // Rutas de comentarios
    Route::get('/comments.list/{problem_id}', [commentsController::class, 'index'])->name('comments.list')->middleware(['auth']);
    Route::get('/comments.new/{problem_id}', [commentsController::class, 'create'])->name('comments.new')->middleware(['auth']);
    Route::post('/comments.create', [commentsController::class, 'store'])->name('comments.create')->middleware(['auth']);
    Route::get('/comments.edit/{id}', [commentsController::class, 'edit'])->name('comments.edit')->middleware(['auth']);
    Route::post('/comments.update/{id}', [commentsController::class, 'update'])->name('comments.update')->middleware(['auth']);
    Route::get('/comments.destroy/{id}/{problem_id}', [commentsController::class, 'destroy'])->name('comments.destroy')->middleware(['auth']);
    Route::get('/comments.all', [commentsController::class, 'allComments'])->name('comments.all')->middleware(['auth']);
    // Rutas de Photos
    Route::get('/photos.list/{problem_id}', [photosController::class, 'index'])->name('photos.list')->middleware(['auth']);
    Route::get('/photos.new/{problem_id}', [photosController::class, 'create'])->name('photos.new')->middleware(['auth']);
    Route::post('/photos.create', [photosController::class, 'store'])->name('photos.create')->middleware(['auth']);
    Route::get('/photos.destroy/{id}/{problem_id}', [photosController::class, 'destroy'])->name('photos.destroy')->middleware(['auth']);
    Route::get('/photos.choose/{id}/{problem_id}', [photosController::class, 'choose'])->name('photos.choose')->middleware(['auth']);
    // Rutas de Usuarios
    Route::get('/users.list', [usersController::class, 'index'])->name('users.list');
    Route::get('/users.find', [usersController::class, 'show'])->name('users.find');
    Route::get('/users.new', [usersController::class, 'create'])->name('users.new');
    Route::post('/users.create', [usersController::class, 'store'])->name('users.create');
    Route::get('/users.edit/{id}', [usersController::class, 'edit'])->name('users.edit');
    Route::post('/users.update/{id}', [usersController::class, 'update'])->name('users.update');
    Route::get('/users.destroy/{id}', [usersController::class, 'destroy'])->name('users.destroy');
});
