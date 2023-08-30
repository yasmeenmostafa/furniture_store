<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [ProductController::class, "all"]);
    Route::get('products/{id}', [ProductController::class, "delete"]);
    Route::get('products/edit/{id}', [ProductController::class, "editform"]);
    Route::post('products/update/{id}', [ProductController::class, "edit"]);
    Route::get('add', [ProductController::class, "addform"]);
    Route::post('products/insert', [ProductController::class, "add"]);
    Route::post('products/search', [ProductController::class, "search"]);

    Route::get('categories', [CategoryController::class, "all"]);
    Route::get('categories/{id}', [CategoryController::class, "delete"]);
    Route::get('categories/edit/{id}', [CategoryController::class, "editform"]);
    Route::post('categories/update/{id}', [CategoryController::class, "edit"]);
    Route::get('categoryadd', [CategoryController::class, "addform"]);
    Route::post('categories/insert', [CategoryController::class, "add"]);
    Route::get('showproducts/{id}', [CategoryController::class, "showproducts"]);
    Route::get('showproducts/delete/{id}/{category_id}', [CategoryController::class, "deleteproduct"]);


    Route::get('orderss', [OrderController::class, "all"]);
    Route::get('orders/{id}', [OrderController::class, "delete"]);
    Route::get('orders/products/{order_id}', [OrderController::class, "showproducts"]);
});




Route::get('/', [UserController::class, "all"]);
Route::get('loginform', [AuthController::class, "loginform"]);
Route::post('login', [AuthController::class, "login"]);
Route::get('registerform', [AuthController::class, "registerform"]);
Route::post('register', [AuthController::class, "register"]);
Route::get('logout', [AuthController::class, "logout"]);
Route::get('redirect', [AuthController::class, "redirect"]);
Route::post('search', [UserController::class, "search"]);


Route::group(['middleware' => 'user'], function () {
// Route::get('/', [UserController::class, "all"]);
Route::get('product/{id}', [UserController::class, "showproduct"]);
Route::get('product/cart/{id}', [UserController::class, "addtocart"]);
Route::get('delete/{key}', [UserController::class, "delete"]);
Route::get('showcart', [UserController::class, "showcart"]);
Route::get('confirmorder', [UserController::class, "confirmorder"]);
Route::get('orders', [UserController::class, "orders"]);
Route::get('profile', [UserController::class, "profile"]);
});