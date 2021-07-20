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

        Route::name('categorie.')->namespace('')->prefix('/categorie')->group(function (){
            Route::get('/list-categorie', 'App\Http\Controllers\CategorieController@index')->name('categorie-list');
            Route::post('/add-categorie', 'App\Http\Controllers\CategorieController@store')->name('categorie-add');
            Route::get('/edit-categorie/{id}', 'App\Http\Controllers\CategorieController@edit')->name('categorie-edit');
            Route::post('/update-categorie/{id}', 'App\Http\Controllers\CategorieController@update')->name('categorie-update');
            Route::get('/create-categorie', 'App\Http\Controllers\CategorieController@create')->name('categorie-create');
            Route::get('/delete-categorie', 'App\Http\Controllers\CategorieController@destroy')->name('categorie-delete');
        });

        Route::name('demande.')->namespace('')->prefix('/demande')->group(function (){
            Route::get('/list-demande', 'App\Http\Controllers\DemandeController@index')->name('demande-list');
            Route::post('/add-demande', 'App\Http\Controllers\DemandeController@store')->name('demande-add');
            Route::get('/edit-demande/{id}', 'App\Http\Controllers\DemandeController@edit')->name('demande-edit');
            Route::post('/update-demande/{id}', 'App\Http\Controllers\DemandeController@update')->name('demande-update');
            Route::get('/create-demande', 'App\Http\Controllers\DemandeController@create')->name('demande-create');
            Route::get('/delete-demande', 'App\Http\Controllers\DemandeController@destroy')->name('demande-delete');
        });

        Route::name('site.')->namespace('')->prefix('/site')->group(function (){
            Route::get('/list-site', 'App\Http\Controllers\SiteController@index')->name('site-list');
            Route::post('/add-site', 'App\Http\Controllers\SiteController@store')->name('site-add');
            Route::get('/edit-site/{id}', 'App\Http\Controllers\SiteController@edit')->name('site-edit');
            Route::post('/update-site/{id}', 'App\Http\Controllers\SiteController@update')->name('site-update');
            Route::get('/create-site', 'App\Http\Controllers\SiteController@create')->name('site-create');
            Route::get('/delete-site', 'App\Http\Controllers\SiteController@destroy')->name('site-delete');
        });

        Route::name('logement.')->namespace('')->prefix('/logement')->group(function (){
            Route::get('/list-logement', 'App\Http\Controllers\LogementController@index')->name('logement-list');
            Route::post('/add-logement', 'App\Http\Controllers\LogementController@store')->name('logement-add');
            Route::get('/edit-logement/{id}', 'App\Http\Controllers\LogementController@edit')->name('logement-edit');
            Route::post('/update-logement/{id}', 'App\Http\Controllers\LogementController@update')->name('logement-update');
            Route::get('/create-logement', 'App\Http\Controllers\LogementController@create')->name('logement-create');
            Route::get('/delete-logement', 'App\Http\Controllers\LogementController@destroy')->name('logement-delete');
        });

        Route::name('article.')->namespace('')->prefix('/article')->group(function (){
            Route::get('/list-article', 'App\Http\Controllers\ArticleController@index')->name('article-list');
            Route::post('/add-article', 'App\Http\Controllers\ArticleController@store')->name('article-add');
            Route::get('/edit-article/{id}', 'App\Http\Controllers\ArticleController@edit')->name('article-edit');
            Route::post('/update-article/{id}', 'App\Http\Controllers\ArticleController@update')->name('article-update');
            Route::get('/create-article', 'App\Http\Controllers\ArticleController@create')->name('article-create');
            Route::get('/delete-article', 'App\Http\Controllers\ArticleController@destroy')->name('article-delete');
        });

        /**
         * pour comprendre les routes des notes surtout pour l`action de sauvegarde
         * et de modification, il faut regarder le prototype des fonctions
         * correspondantes dans le controlleurs.
         *
         * Aussi bien consulter la hierachie des dossiers et fichiers dans le
         * controller. Ex note.noteArticle.ajoutArticle
         */
        Route::name('note.')->namespace('')->prefix('/note')->group(function (){
            Route::get('/list-note', 'App\Http\Controllers\NoteController@index')->name('note-list');
            Route::post('/add-note/{marker_id}', 'App\Http\Controllers\NoteController@store')->name('note-add');
            Route::get('/edit-note/{id}', 'App\Http\Controllers\NoteController@edit')->name('note-edit');
            Route::post('/update-note/{id}/{marker_id}', 'App\Http\Controllers\NoteController@update')->name('note-update');
            Route::get('/create-note/{id}', 'App\Http\Controllers\NoteController@create')->name('note-create');
            Route::get('/delete-note', 'App\Http\Controllers\NoteController@destroy')->name('note-delete');
        });

        Route::name('note-article.')->namespace('')->prefix('/note-article')->group(function (){
            Route::get('/list-note-article', 'App\Http\Controllers\NoteArticleController@index')->name('note-article-list');
            Route::post('/add-note-article/{article_id}', 'App\Http\Controllers\NoteArticleController@store')->name('note-article-add');
            Route::get('/edit-note-article/{id}', 'App\Http\Controllers\NoteArticleController@edit')->name('note-article-edit');
            Route::post('/update-note-article/{id}/{article_id}', 'App\Http\Controllers\NoteArticleController@update')->name('note-article-update');
            Route::get('/create-note-article/{id}', 'App\Http\Controllers\NoteArticleController@create')->name('note-article-create');
            Route::get('/delete-note-article/{id}', 'App\Http\Controllers\NoteArticleController@destroy')->name('note-article-delete');
        });

        Route::name('note-site.')->namespace('')->prefix('/note-site')->group(function (){
            Route::get('/list-note-site', 'App\Http\Controllers\NoteSiteController@index')->name('note-site-list');
            Route::post('/add-note-site/{site_id}', 'App\Http\Controllers\NoteSiteController@store')->name('note-site-add');
            Route::get('/edit-note-site/{id}', 'App\Http\Controllers\NoteSiteController@edit')->name('note-site-edit');
            Route::post('/update-note-site/{id}/{site_id}', 'App\Http\Controllers\NoteSiteController@update')->name('note-site-update');
            Route::get('/create-note-site/{id}', 'App\Http\Controllers\NoteSiteController@create')->name('note-site-create');
            Route::get('/delete-note-site', 'App\Http\Controllers\NoteSiteController@destroy')->name('note-site-delete');
        });

        Route::name('note-logement.')->namespace('')->prefix('/note-logement')->group(function (){
            Route::get('/list-note-logement', 'App\Http\Controllers\NoteLogementController@index')->name('note-logement-list');
            Route::post('/add-note-logement/{logement_id}', 'App\Http\Controllers\NoteLogementController@store')->name('note-logement-add');
            Route::get('/edit-note-logement/{id}', 'App\Http\Controllers\NoteLogementController@edit')->name('note-logement-edit');
            Route::post('/update-note-logement/{id}/{logement_id}', 'App\Http\Controllers\NoteLogementController@update')->name('note-logement-update');
            Route::get('/create-note-logement{id}', 'App\Http\Controllers\NoteLogementController@create')->name('note-logement-create');
            Route::get('/delete-note-logement', 'App\Http\Controllers\NoteLogementController@destroy')->name('note-logement-delete');
        });

        /**
         * pour comprendre les routes des commentaires surtout pour l`action de sauvegarde
         * et de modification, il faut regarder le prototype des fonctions
         * correspondantes dans le controlleurs.
         *
         * Aussi bien consulter la hierachie des dossiers et fichiers dans le
         * controller. Ex commentaire.commentaireArticle.ajoutArticle
         */

        Route::name('commentaire.')->namespace('')->prefix('/commentaire')->group(function (){
            Route::get('/list-commentaire', 'App\Http\Controllers\CommentaireController@index')->name('commentaire-list');
            Route::post('/add-commentaire/{marker_id}', 'App\Http\Controllers\CommentaireController@store')->name('commentaire-add');
            Route::get('/edit-commentaire/{id}', 'App\Http\Controllers\CommentaireController@edit')->name('commentaire-edit');
            Route::post('/update-commentaire/{id}/{marker_id}', 'App\Http\Controllers\CommentaireController@update')->name('commentaire-update');
            Route::get('/create-commentaire{id}', 'App\Http\Controllers\CommentaireController@create')->name('commentaire-create');
            Route::get('/delete-commentaire', 'App\Http\Controllers\CommentaireController@destroy')->name('commentaire-delete');
        });

        Route::name('commentaire-site.')->namespace('')->prefix('/commentaire-site')->group(function (){
            Route::get('/list-commentaire-site', 'App\Http\Controllers\CommentaireSiteController@index')->name('commentaire-site-list');
            Route::post('/add-commentaire-site/{site_id}', 'App\Http\Controllers\CommentaireSiteController@store')->name('commentaire-site-add');
            Route::get('/edit-commentaire-site/{id}', 'App\Http\Controllers\CommentaireSiteController@edit')->name('commentaire-site-edit');
            Route::post('/update-commentaire-site/{id}/{site_id}', 'App\Http\Controllers\CommentaireSiteController@update')->name('commentaire-site-update');
            Route::get('/create-commentaire-site/{id}', 'App\Http\Controllers\CommentaireSiteController@create')->name('commentaire-site-create');
            Route::get('/delete-commentaire-site', 'App\Http\Controllers\CommentaireSiteController@destroy')->name('commentaire-site-delete');
        });

        Route::name('commentaire-logement.')->namespace('')->prefix('/commentaire-logement')->group(function (){
            Route::get('/list-commentaire-logement', 'App\Http\Controllers\CommentaireLogementController@index')->name('commentaire-logement-list');
            Route::post('/add-commentaire-logement/{logement_id}', 'App\Http\Controllers\CommentaireLogementController@store')->name('commentaire-logement-add');
            Route::get('/edit-commentaire-logement/{id}', 'App\Http\Controllers\CommentaireLogementController@edit')->name('commentaire-logement-edit');
            Route::post('/update-commentaire-logement/{id}/{logement_id}', 'App\Http\Controllers\CommentaireLogementController@update')->name('commentaire-logement-update');
            Route::get('/create-commentaire-logement/{id}', 'App\Http\Controllers\CommentaireLogementController@create')->name('commentaire-logement-create');
            Route::get('/delete-commentaire-logement', 'App\Http\Controllers\CommentaireLogementController@destroy')->name('commentaire-logement-delete');
        });

        Route::name('commentaire-article.')->namespace('')->prefix('/commentaire-article')->group(function (){
            Route::get('/list-commentaire-article', 'App\Http\Controllers\CommentaireArticleController@index')->name('commentaire-article-list');
            Route::post('/add-commentaire-article/{article_id}', 'App\Http\Controllers\CommentaireArticleController@store')->name('commentaire-article-add');
            Route::get('/edit-commentaire-article/{id}', 'App\Http\Controllers\CommentaireArticleController@edit')->name('commentaire-article-edit');
            Route::post('/update-commentaire-article/{id}/{article_id}', 'App\Http\Controllers\CommentaireArticleController@update')->name('commentaire-article-update');
            Route::get('/create-commentaire-article/{id}', 'App\Http\Controllers\CommentaireArticleController@create')->name('commentaire-article-create');
            Route::get('/delete-commentaire-article', 'App\Http\Controllers\CommentaireArticleController@destroy')->name('commentaire-article-delete');
        });

    });
});

