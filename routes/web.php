<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('sizes', SizeController::class);
});

