<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{id}/show_profile', [App\Http\Controllers\HomeController::class, 'show_profile']);
Route::get('/profile', [App\Http\Controllers\PostController::class, 'index'])->name('profile');
Route::get('/profile/upload', [App\Http\Controllers\PostController::class, 'create'])->name('post');
Route::post('/profile/upload', [App\Http\Controllers\PostController::class, 'store'])->name('posting');
Route::get('/profile/{id}/show', [App\Http\Controllers\PostController::class, 'show']);
Route::get('/profile/{id}/edit', [App\Http\Controllers\PostController::class, 'edit']);
Route::get('/profile/{id}/hapus', [App\Http\Controllers\PostController::class, 'destroy']);
Route::post('/profile/{id}/update', [App\Http\Controllers\PostController::class, 'update']);

Route::get('/comment/{id}', [App\Http\Controllers\CommentController::class, 'index']);
Route::post('/comment/{id}/new_comment', [App\Http\Controllers\CommentController::class, 'store_comment']);

Route::get('/home/{id}/like', [App\Http\Controllers\LikeController::class, 'store_like']);
Route::get('/home/{id}/unlike', [App\Http\Controllers\LikeController::class, 'unlike']);