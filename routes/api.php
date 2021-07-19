<?php

use Illuminate\Http\Request;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api', 'add-user'])->group(function () {
    Route::group(['prefix' => 'Ville'], function () {
        Route::post('/', [VilleController::class, 'store']);
        Route::post('/{id}', [VilleController::class, 'update']);
        Route::get('/', [VilleController::class, 'index']);
        Route::get('/{id}', [VilleController::class, 'show']);
        Route::delete('/{id}', [VilleController::class, 'destroy']);
    });
});


