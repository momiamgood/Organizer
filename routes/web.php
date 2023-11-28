<?php

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
    return view('home');
});

Route::get('/login', [\App\Http\Controllers\Auth\Login::class, 'show'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\Login::class, 'login']);

Route::get('/register', [\App\Http\Controllers\Auth\Register::class, 'show'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\Register::class, 'store']);

Route::get('/logout', [\App\Http\Controllers\Auth\Logout::class, 'logout']);
