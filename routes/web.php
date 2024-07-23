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


Route::group(['prefix' => 'auth'], function () {
    Route::get('page/signUp', [AuthController::class, 'getAuthPage']);
    Route::get('page/signIn', [LoginController::class, 'getLoginPage']);
    Route::post('/create', [AuthController::class, 'singUpUser']);
});


Route::group(['prefix' => 'main'], function() {
    Route::get('/', [MainController::class, 'getMainPage']);
});




Route::get('/welcomePage', [MainController::class, 'getWelcomePage']);
Route::post('/login', [LoginController::class, 'loginUser']);


