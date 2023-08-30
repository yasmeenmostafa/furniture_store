<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('products',[ProductController::class,"all"]);
Route::get('product/{id}',[ProductController::class,"showone"]);
Route::post('store',[ProductController::class,"store"]);
Route::post('update',[ProductController::class,"update"]);
Route::delete('delete/{id}',[ProductController::class,"delete"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
