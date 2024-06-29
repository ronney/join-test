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
 Route::post('categorias', [CategoriesController::class ,'store'])->name('categorias.store');
 Route::get('categorias', [CategoriesController::class ,'index'])->name('categorias.index');
 Route::get('categorias/{id}', [CategoriesController::class ,'show'])->name('categorias.show');
 Route::put('categorias/{id}', [CategoriesController::class ,'update'])->name('categorias.update');
 Route::delete('categorias/{id}', [CategoriesController::class ,'destroy'])->name('categorias.destroy');

 Route::post('produtos', [ProductsController::class ,'store'])->name('produtos.store');
 Route::get('produtos', [ProductsController::class ,'index'])->name('produtos.index');
 Route::get('produtos/{id}', [ProductsController::class ,'show'])->name('produtos.show');
 Route::put('produtos/{id}', [ProductsController::class ,'update'])->name('produtos.update');
 Route::delete('produtos/{id}', [ProductsController::class ,'destroy'])->name('produtos.destroy');



