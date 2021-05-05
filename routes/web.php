<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;




// home route
Route::get('/', function() {
    return view('home');
})->name('home');


// dashoboard route
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');


Route::get('/user/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

// logout route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// login route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// register route
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


// post
Route::get('/post', [PostController::class, 'index'])->name('posts');
Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/post', [PostController::class, 'store']);
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// likes
Route::post('/post/{post}/like', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/post/{post}/like', [PostLikeController::class, 'destroy'])->name('posts.likes');



// // post route (default)
// Route::get('/post', function () {
//     // return view('welcome');
//     // Laravel Crash Course 2020
    
//     return view('post.index');
// });

