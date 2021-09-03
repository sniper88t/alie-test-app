<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


// Route::middleware('api')->group(function () {
//     Route::resource('products', ProductController::class);
// });



Route::get('/products', [ProductController::class, 'index']);
Route::group(['prefix' => 'product'], function () {
    Route::post('/add', [ProductController::class, 'store']);
    Route::get('/edit/{id}', [ProductController::class, 'show']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
});
