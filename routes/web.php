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

Route::get('/', 'HomeController@index');

Route::get('/articles/{article}', 'ArticleController@showShort');
Route::get('/articles/{article}/{slug}', 'ArticleController@show')
    ->name('articles.show');

Route::get('/tags/{tag}', 'TagController@show')
    ->name('tags.show');

Route::get('/search', 'SearchController@index')
    ->name('search.index');

Route::get('/authors/{username}', 'AuthorController@show')
    ->name('authors.show');

Route::group([
    'prefix'    => 'admin-panel',
    'namespace' => 'AdminPanel',
    'as'        => 'admin-panel.',
], function () {
    Route::resource('articles', 'ArticleController');
    Route::get('articles/{article}/markdown', 'ArticleController@markdown')
        ->name('articles.markdown');

});
