<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
Route::get('/posts', function (){
   return view('posts.index');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/register',[AuthController::class, 'registerIndex'])->name('register');
Route::post('/register',[AuthController::class, 'registerStore'])->name('register.store');

Route::get('/', function () {
    return view('welcome');
});
