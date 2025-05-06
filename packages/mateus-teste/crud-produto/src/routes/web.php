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
//Route::resource('categories', CategoryController::class);
Route::controller(CategoryController::class)->group(function (){
    Route::get('/categories', [UserController::class, 'index']);
    Route::get('/categories/create', [UserController::class, 'create']);
    Route::get('/categories/{id}/edit', [UserController::class, 'edit']);
    Route::post('/categories/store', [UserController::class, 'store']);
    Route::put('/categories/{id}', [UserController::class, 'update']);
    Route::delete('/categories/{id}', [UserController::class, 'destroy']);
});

