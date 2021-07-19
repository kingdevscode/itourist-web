<?php

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('getArticle', 'App\Http\Controllers\ArticleController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'add-user'])->group(function () {
    Route::name('tourisme')->namespace('')->prefix('/tourisme')->group(function (){
        Route::name('ville.')->namespace('')->prefix('/ville')->group(function (){
            Route::get('/list-ville', 'App\Http\Controllers\VilleController@index')->name('ville-list');
            Route::post('/add-ville', 'App\Http\Controllers\VilleController@store')->name('ville-add');
            Route::get('/edit-ville/{id}', 'App\Http\Controllers\VilleController@edit')->name('ville-edit');
            Route::post('/update-ville/{id}', 'App\Http\Controllers\VilleController@update')->name('ville-update');
            Route::get('/create-ville', 'App\Http\Controllers\VilleController@create')->name('ville-create');
            Route::get('/delete-ville', 'App\Http\Controllers\VilleController@destroy')->name('ville-delete');
        });

    });
});

