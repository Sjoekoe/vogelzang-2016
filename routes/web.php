<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('about', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('manege', ['as' => 'manege', 'uses' => 'HomeController@manege']);
Route::get('accommodatie', ['as' => 'accommodatie', 'uses' => 'HomeController@accommodation']);
Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::get('faq', ['as' => 'faq', 'uses' => 'HomeController@faq']);
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.store', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
Route::get('riders', ['as' => 'riders.index', 'uses' => 'RiderController@index']);
Route::get('messages', ['as' => 'messages.index', 'uses' => 'MessageController@index']);
Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index']);
Route::get('announcements', ['as' => 'announcements.index', 'uses' => 'AnnouncementController@index']);
Route::get('veelgestelde-vragen', ['as' => 'faq.index', 'uses' => 'FaqController@index']);
Route::get('reservations', ['as' => 'reservations.index', 'uses' => 'ReservationController@index']);

Route::get('articles', ['as' => 'news.index', 'uses' => 'NewsController@index']);
Route::get('rosters', ['as' => 'rosters.index', 'uses' => 'RosterController@index']);
Route::get('setting', ['as' => 'setting.index', 'uses' => 'SettingController@index']);

Route::get('nieuws', ['as' => 'articles.index', 'uses' => 'ArticleController@index']);
Route::get('nieuws/{article}', ['as' => 'articles.show', 'uses' => 'ArticleController@show']);

Route::get('/sitemap', function() {
    $file = public_path() .  '/download/sitemap.xml';  // <- Replace with the path to your .xml file

    if (file_exists($file)) {
        $content = file_get_contents($file);
        return Response::make($content, 200, ['content-type'=>'application/xml']);
    }
});
