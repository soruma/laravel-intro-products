<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;

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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/', ProductController::class)->names([
        'index' => 'products.index',
        'create' => 'products.create',
    ])->except(['show', 'edit', 'update', 'store', 'destroy']);
    Route::resource('/products', ProductController::class)->only([
        'edit', 'update', 'store', 'destroy'
    ]);
});
