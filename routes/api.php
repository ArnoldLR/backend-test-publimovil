<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ProductsController;
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

Route::controller(AuthController::class)->group(function(){
    Route::post('/auth/register', 'register');
    Route::post('/auth/login', 'login');
});

Route::controller(UsersController::class)->group(function(){
    Route::get('/users', 'users');
    Route::get('/user/delete/{id}', 'delete');
    Route::post('/create-user', 'user');
    Route::post('/update-user', 'user');
});

Route::controller(ProductsController::class)->group(function(){
    Route::get('/products', 'products');
    Route::get('/product/{id}', 'show');
    Route::get('/product/delete/{id}', 'delete');
    Route::post('/create-product', 'product');
    Route::post('/update-product', 'product');
    Route::get('/search-products/{text}', 'search');
});



