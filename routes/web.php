<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('home.home', [
        'posts' => Post::all()
    ]);
});

//Route::get('/post', function () {
//    return view('post');
//});

Route::get('/post/{post}', function (Post $post) {
    return view('post.post', [
        'post' => $post
    ]);
});

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy']);

Route::get('/post', [PostController::class, 'create'])->middleware('auth');
Route::post('/post', [PostController::class, 'store'])->middleware('auth');

Route::post('/comment', [CommentController::class, 'create']);
