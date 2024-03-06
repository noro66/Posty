<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserPostController;
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
//Route::get('/posts', [PostsController::class, 'index'])->name('posts');
//Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('/home', function (){
   return view('home');
})->name('home');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');


Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
Route::middleware(['guest'])
    ->group( function (){
Route::get('/login',[AuthController::class, 'loginIndex'])->name('login');
Route::get('/register',[AuthController::class, 'registerIndex'])->name('register');
Route::post('/login',[AuthController::class, 'loginStore'])->name('login.store');
Route::post('/register',[AuthController::class, 'registerStore'])->name('register.store');
        });
Route::get('/', function () {
    return view('welcome');
});


Route::resource('posts', PostsController::class);
Route::post('posts/{post}/likes', [LikesController::class, 'store'])->name('posts.likes');
Route::delete('posts/{post}/likes', [LikesController::class, 'destroy'])->name('posts.likes');
