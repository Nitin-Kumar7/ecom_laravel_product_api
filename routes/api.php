<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Prodcuts API Routes
// We can use resource for default routes so skip this , we make manaual routes  for API 
// Route::resource('products', 'ProductController');

Route::get('products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('products/{id?}', [ProductController::class, 'index']);  
Route::get('products', [ProductController::class, 'index'])->where('id', '')->name('products.index');
Route::post('products/add',[ProductController::class,'create']);
Route::put('products/update/{id}', [ProductController::class, 'update']);
Route::delete('products/delete/{id}', [ProductController::class, 'delete']);

