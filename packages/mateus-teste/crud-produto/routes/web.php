<?php

use MateusTeste\CrudAdminlte\Controllers\ProductsController;
use MateusTeste\CrudAdminlte\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('products', ProductsController::class);
Route::resource('categories', CategoryController::class);

