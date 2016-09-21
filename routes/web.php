<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('about', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('manege', ['as' => 'manege', 'uses' => 'HomeController@manege']);
Route::get('accommodatie', ['as' => 'accommodatie', 'uses' => 'HomeController@accommodation']);
Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.store', 'uses' => 'Auth\LoginController@login']);
Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
Route::get('riders', ['as' => 'riders.index', 'uses' => 'RiderController@index']);
Route::get('messages', ['as' => 'messages.index', 'uses' => 'MessageController@index']);

Route::get('news/{article}', ['as' => 'articles.show', 'uses' => 'ArticleController@show']);

Route::get('/sitemap', function() {
    $file = public_path() .  '/download/sitemap.xml';  // <- Replace with the path to your .xml file

    if (file_exists($file)) {
        $content = file_get_contents($file);
        return Response::make($content, 200, ['content-type'=>'application/xml']);
    }
});
