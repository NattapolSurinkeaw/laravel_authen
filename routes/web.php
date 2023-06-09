<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[Controller::class,'homePage']);
Route::get('/login',[Controller::class, 'loginPage']);



Route::get('user',[UserLoginController::class,'showForm']);
Route::post('/user/login',[UserLoginController::class,'checkLogin']);
Route::get('/user/logout',[UserLoginController::class,'logOut']);

Route::get('admin',[AdminLoginController::class,'showForm']);

Route::get('/products', [ProductController::class,"getProducts"]);
Route::get('/createproduct', [ProductController::class,'createform']);

Route::get('/editproduct/{id}', [ProductController::class,'editform']);

Route::get('/cart',[ProductController::class,"cartProduct"]);

