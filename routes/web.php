<?php

use App\Http\Controllers\Admin\BillController;
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
Route::get('/logout', function () {
    return view('welcome');
});

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

    Route::prefix('bill')->group(function () {
        Route::get('/', [BillController::class, 'index'])->name('bills.index');
        Route::get('/create', [BillController::class, 'create'])->name('bills.create');
        Route::post('/store', [BillController::class, 'store'])->name('bills.store');
        Route::get('/{id}', [BillController::class, 'show'])->name('bills.show');
        Route::get('/edit/{id}', [BillController::class, 'edit'])->name('bills.edit');
        Route::put('/update/{id}', [BillController::class, 'update'])->name('bills.update');
        Route::delete('/delete/{id}', [BillController::class, 'destroy'])->name('bills.destroy');
    });
});