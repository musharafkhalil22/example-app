<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Auth

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::Post('register', [RegisteredUserController::class, 'store']);
    
    Route::get('login', [LoginUserController::class, 'create'])->name('login');
    
    Route::Post('login', [LoginUserController::class, 'store']);
});

Route::middleware('auth')->group(function (){
    Route::Post('logout', [LoginUserController::class, 'destroy'])->name('logout');


Route::get('product_listing', [HomeController::class, 'product']);

Route::post('add_product', [HomeController::class, 'add_product']);

Route::get('show_product', [HomeController::class, 'show_product']);

Route::get('/delete_product/{id}', [HomeController::class, 'delete_product'])->name('delete_product');

Route::get('/edit_product/{id}', [HomeController::class, 'edit_view']);

Route::get('dashboard', [AdminController::class, 'dashboard']);

Route::post('/update_product/{id}', [HomeController::class, 'update_product']);
});




