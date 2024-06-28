<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
 Route::post('categories', [CategoriesController::class ,'store'])->name('categories.store');
 Route::get('categories', [CategoriesController::class ,'index'])->name('categories.index');
 Route::get('categories/{id}', [CategoriesController::class ,'show'])->name('categories.show');
 Route::put('categories/{id}', [CategoriesController::class ,'update'])->name('categories.update');
 Route::delete('categories/{id}', [CategoriesController::class ,'destroy'])->name('categories.destroy');

 Route::post('products', [ProductsController::class ,'store'])->name('products.store');
 Route::get('products', [ProductsController::class ,'index'])->name('products.index');
 Route::get('products/{id}', [ProductsController::class ,'show'])->name('products.show');
 Route::put('products/{id}', [ProductsController::class ,'update'])->name('products.update');
 Route::delete('products/{id}', [ProductsController::class ,'destroy'])->name('products.destroy');



