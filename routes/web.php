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

// Route::get('/product', [ProductController::class,'index'])->name('product.index');
// Route::get('/product/{id}', [ProductController::class,'show'])->name('product.show');

// Route::controller(ProductController::class)->name('product.')->group(function(){
//   Route::get('/product/create', 'create')->name('create');
//   Route::post('/product', 'store')->name('store');
//   Route::get('/product/{id}/edit', 'edit')->name('edit');
//   Route::put('/product/{id}', 'update')->name('update');
//   Route::delete('/product/{id}', 'destroy')->name('destroy');
// });

Route::resource('product', ProductController::class)->except(['index','show'])->middleware('withAuth');
Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::get('/product/{product}', [ProductController::class,'show'])->name('product.show');
Route::resource('blog', BlogController::class);

Route::any('login', [AuthController::class, 'login'])->name('login');
Route::any('register', [AuthController::class, 'register'])->name('register');
Route::any('logout', [AuthController::class, 'logout'])->name('logout');
// Route::any("/login", [AuthController::class, 'login'])->name('login');
// Route::any("/register", [AuthController::class, 'register'])->name('register');