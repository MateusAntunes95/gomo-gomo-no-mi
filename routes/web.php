<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    LoginController,
    UserController,
    ProdutoController
    
};

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
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login/auth', [LoginController::class, 'auth'])->name('auth');

Route::resource('user', UserController::class)->except(['show']);
Route::resource('produto', ProdutoController::class)->except(['show']);
