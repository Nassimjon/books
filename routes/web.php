<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
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


Route::get('/auth', [AuthController::class, 'getAuthPage'])->middleware('guest')->name('auth');

Route::post('/authUser', [AuthController::class, 'authUser']);

Route::get('/index',[MainController::class, 'getMainPage'])->middleware('auth')->name('index');

Route::get('/welcomePage', [MainController::class, 'getWelcomePage'])->middleware('admin')->name('welcome');

Route::post('/login', [LoginController::class, 'loginUser']);

Route::get('/loginPage', [LoginController::class, 'getLoginPage']);


//Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
