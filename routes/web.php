<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/details/{id}', [HomeController::class, 'details'])->name('product.details');
Route::get('all-product', [HomeController::class, 'allProduct'])->name('product.all');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

    Route::prefix('/product')->group(function() {
        Route::controller(ProductController::class)->group(function() {
            Route::get('/create', 'create')->name('product.create');
            Route::post('/store', 'store')->name('product.store');
            Route::get('/manage', 'index')->name('product.manage');
            Route::get('/status/{id?}', 'status')->name('product.status');
            Route::get('/edit/{id}', 'edit')->name('product.edit');
            Route::post('/update/{id}', 'update')->name('product.update');
            Route::get('/delete/{id}', 'delete')->name('product.delete');
        });
    });

});
