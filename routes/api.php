<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CartController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products',[BackendController::class,'getProduct']);
Route::get('/product/{id}',[BackendController::class,'getProductById']);
Route::post('/createproduct',[BackendController::class,'createproducts']);
Route::put('/editproduct/{id}',[BackendController::class,'editProduct']);
Route::delete('/delete/{id}',[BackendController::class,'deleteProduct']);
Route::get('/carts',[CartController::class,"getProductCart"]);
Route::post('/cart/{id}',[CartController::class,"addToCart"]);