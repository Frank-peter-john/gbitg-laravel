<?php
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. 
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    
   // Route to list products
    Route::get('/products', [ProductController::class, 'getProducts']);

    // Route to rate a product
    Route::post('/rate-product/{id}', [RatingController::class, 'rateProduct']);

    // Route to remove a rating
    Route::delete('/remove-product-rating/{id}', [RatingController::class, 'removeRating']);

    // Route to update a rating
    Route::put('/update-product-rating/{id}', [RatingController::class, 'updateRating']);
});


//Auth Endpoints
Route::post('/login', [AuthController::class, 'userLogin']);