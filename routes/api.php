<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductsController;

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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});


//Route::group(['middleware' => ['jwt.verified']], function() {

    Route::get('/all-products', [ProductsController::class, 'allProudcts']);    
    Route::post('/store-products', [ProductsController::class, 'storeProducts']); 


    Route::get('/update-products/{id}', [ProductsController::class, 'editProducts']);    
    Route::put('/update-products/{id}', [ProductsController::class, 'updateProducts']);   


    Route::get('/delete-products/{id}', [ProductsController::class, 'deleteProducts']);

     Route::get('/single-product/{id}', [ProductsController::class, 'singleProduct']);    


//});