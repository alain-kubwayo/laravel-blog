<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogLikeController;
use App\Http\Controllers\UserBlogController;

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

Route::get('/posts', function () {
    return view('posts.index');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::post('/blogs', [BlogController::class, 'store']);
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/users/{user:username}/blogs', [UserBlogController::class, 'index'])->name('users.blogs');

Route::post('/blogs/{blog}/likes', [BlogLikeController::class, 'store'])->name('blog.likes');
Route::delete('/blogs/{blog}/likes', [BlogLikeController::class, 'destroy'])->name('blog.likes');

Route::get('/', function(){
    return view('home');
})->name('home');