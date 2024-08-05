<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
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


Route::group(['prefix' => 'auth', ], function () {
    Route::get('signup_page', [AuthController::class, 'getAuthPage'])->name('signup_page');
    Route::get('login-page', [LoginController::class, 'getLoginPage']);
    Route::post('create', [AuthController::class, 'singUpUser']);
    Route::post('login', [LoginController::class, 'loginUser']);
});

Route::group(['prefix' => 'main', 'middleware' => 'auth'], function() {
    Route::get('/', [MainController::class, 'getMainPage']);
});

Route::get('/welcomePage', [MainController::class, 'getWelcomePage'])->middleware('admin');

Route::get('/admin', [TestController::class, 'getAdminPage']);




