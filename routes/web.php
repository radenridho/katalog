<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\DashboardController;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('guest');


Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store']);

Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category')->middleware('auth');
Route::resource('category', CategoryController::class)->middleware('auth');

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product')->middleware('auth');
Route::resource('product', ProductController::class)->middleware('auth');
