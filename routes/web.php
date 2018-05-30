<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article')->middleware('articles');
Route::get('/articles', 'BlogController@viewArticles');

Route::get('/create', 'BlogController@viewCreate')->middleware('isLogin');
Route::post('/create', 'BlogController@createArticle')->name('create');

Route::delete('/article/{id}', 'BlogController@deleteArticle')->name('delete')->
middleware('isAuthor');
Route::get('/article/{id}', 'BlogController@articleById');

Route::put('/article/edit/{id}', 'BlogController@editArticle')->name('edit');
Route::get('/article/edit/{id}', 'BlogController@viewEdit')->middleware(['isLogin','isAuthor']);

Route::get('/request/{id}', 'BlogController@request');

Auth::routes();
