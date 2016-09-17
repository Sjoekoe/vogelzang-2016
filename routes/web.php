<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('accommodation', ['as' => 'accommodation', 'uses' => 'HomeController@accommodation']);
Route::get('manege', ['as' => 'manege', 'uses' => 'HomeController@manege']);
Route::get('about', ['as' => 'about', 'uses' => 'HomeController@about']);

Route::get('news', ['as' => 'news.index', 'uses' => 'ArticleController@index']);
Route::get('news/{article}', ['as' => 'articles.show', 'uses' => 'ArticleController@show']);

Route::get('contact', ['as' => 'contact.index', 'uses' => 'ContactController@index']);
Route::post('contact', ['as' => 'contact.store', 'uses' => 'ContactController@store']);

Route::get('/sitemap', function() {
    $file = public_path() .  '/download/sitemap.xml';  // <- Replace with the path to your .xml file

    if (file_exists($file)) {
        $content = file_get_contents($file);
        return Response::make($content, 200, ['content-type'=>'application/xml']);
    }
});
