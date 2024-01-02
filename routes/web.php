<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::name('post.')->group(function() {
    Route::get('/post', [PostController::class, 'index'])->name('index');
    Route::get('/post/create', [PostController::class, 'create'])->name('create');
    Route::post('/post/create', [PostController::class, 'store'])->name('store');
    Route::get('/post/{id}/delete', [PostController::class, 'delete'])->name('delete');
});
