<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginUserController;


Route::get('/', function () {
    return view('welcome');
});

// Auth

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

Route::Post('register', [RegisteredUserController::class, 'store']);

Route::get('login', [LoginUserController::class, 'create'])->name('login');

Route::Post('login', [LoginUserController::class, 'store']);

Route::Post('logout', [LoginUserController::class, 'destroy'])->name('logout');