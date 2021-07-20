<?php

use Illuminate\Http\Request;
use App\Http\Controllers\NoteController;
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


    Route::group(['prefix' => 'Note'], function () {
        Route::post('ajout/{id}', [NoteController::class, 'store']);
        Route::post('/{id}/{id1}', [NoteController::class, 'update']);
        Route::get('/', [NoteController::class, 'index']);
        Route::get('/{id}', [NoteController::class, 'show']);
        Route::delete('/{id}', [NoteController::class, 'destroy']);
    });



