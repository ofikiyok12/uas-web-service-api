<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MatkulController;
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

Route::get('/task','App\Http\Controllers\MatkulController@ambil');
// Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('products', [ProductController::class, 'store'])->name('products.store');
// Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('task/{id}','App\Http\Controllers\ProductController@destroy');



Route::get('/hai', function () {
    return view('welcome');
});

Route::get('/test', [tesController::class, 'index']);
Route::get('/test/create', [tesController::class, 'create']);
Route::get('/test/store', [tesController::class, 'store']);

// Route::get('/test/create','tesController@create')->name('test.create');
