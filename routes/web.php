<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomePageController;

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

Route::get('/', HomePageController::class)->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('product.name');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product.name');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.name');
Route::get('/blog/{id}', [BlogController::class, 'index'])->name('blog.name');

Route::middleware([])->group(function(){
  Route::resource('/product', ProductController::class)->except(['index', 'show']);
  Route::resource('/blog', BlogController::class)->except(['index', 'show']);
});

Route::any('login', [AuthController::class, 'login'])->name('login')->middleware();
Route::any('register', [AuthController::class, 'register'])->name('register')->middleware();
Route::any('logout', [AuthController::class, 'logout'])->name('logout')->middleware();
// Route::any("/login", [AuthController::class, 'login'])->name('login');
// Route::any("/register", [AuthController::class, 'register'])->name('register');