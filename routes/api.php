<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductSliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

Route::post('create',[AuthController::class,'create']);
Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);




   

});




Route::group(['middleware' => ['auth:api','role:admin']], function ($router) {

   Route::apiResource('brands', BrandController::class);
   Route::apiResource('categories', CategoryController::class);
   Route::apiResource('products', ProductController::class);
   Route::apiResource('product-details', ProductDetailController::class);
   Route::apiResource('product-sliders',ProductSliderController::class);

   

});

Route::middleware(['auth:api','role:admin,customer'])->group(function () {
    
   Route::apiResource('product-reviews',ProductReviewController::class);
   Route::apiResource('product-carts',ProductCartController::class);
   

});

