<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SessionsController;
use App\Models\Post;
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


Route::get('/register', [RegisterController::class, 'create'])->name('registerForm')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->name('loginForm')->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->name('login')->middleware('guest');

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/post', [PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('/post', [PostController::class, 'store'])->name('post.store')->middleware('auth');
//3694274942cd80ee934766cfc7bdb4cc

Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

Route::post('/comment', [CommentController::class, 'create'])->name('comment.create');

Route::post('/reply', [ReplyController::class, 'create'])->name('reply.create');
