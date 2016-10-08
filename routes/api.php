<?php

use Dingo\Api\Routing\Router;

$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['namespace' => 'App\\Api\\Http\\Controllers\\', 'middleware' => 'bindings', 'as' => 'api.'], function (Router $api) {
        $api->group(['middleware' => 'api.auth'], function (Router $api) {
            $api->group(['prefix' => 'articles'], function (Router $api) {
                $api->get('/', ['as' => 'articles.index', 'uses' => 'ArticleController@index']);
                $api->post('/', ['as' => 'articles.store', 'uses' => 'ArticleController@store']);
                $api->get('/{article}', ['as' => 'articles.show', 'uses' => 'ArticleController@show']);
                $api->put('/{article}', ['as' => 'articles.update', 'uses' => 'ArticleController@update']);
                $api->delete('/{article}', ['as' => 'articles.delete', 'uses' => 'ArticleController@delete']);

                $api->group(['prefix' => '/{article}/pictures', 'as' => 'articles.'], function (Router $api) {
                    $api->get('/', ['as' => 'pictures.index', 'uses' => 'ArticlePictureController@index']);
                    $api->post('/', ['as' => 'pictures.store', 'uses' => 'ArticlePictureController@store']);
                    $api->get('/{picture}', ['as' => 'pictures.show', 'uses' => 'ArticlePictureController@show']);
                    $api->delete('/{picture}', ['as' => 'pictures.delete', 'uses' => 'ArticlePictureController@delete']);
                });
            });
        });

        $api->group(['prefix' => 'rosters'], function (Router $api) {
            $api->get('/', ['as' => 'rosters.index', 'uses' => 'RosterController@index']);
            $api->post('/', ['as' => 'rosters.store', 'uses' => 'RosterController@store']);
            $api->get('/{roster}', ['as' => 'rosters.show', 'uses' => 'RosterController@show']);
            $api->put('/{roster}', ['as' => 'rosters.update', 'uses' => 'RosterController@update']);
            $api->delete('/{roster}', ['as' => 'rosters.delete', 'uses' => 'RosterController@delete']);

            $api->group(['prefix' => '/{roster}/subscriptions', 'as' => 'rosters.'], function (Router $api) {
                $api->get('/', ['as' => 'subscriptions.index', 'uses' => 'SubscriptionController@index']);
                $api->post('/', ['as' => 'subscriptions.store', 'uses' => 'SubscriptionController@store']);
                $api->delete('/{subscription}', ['as' => 'subscriptions.delete', 'uses' => 'SubscriptionController@delete']);
            });
        });

        $api->group(['prefix' => 'users'], function (Router $api) {
            $api->get('/', ['as' => 'users.index', 'uses' => 'UserController@index']);
            $api->post('/', ['as' => 'users.store', 'uses' => 'UserController@store']);
            $api->get('/{user}', ['as' => 'users.show', 'uses' => 'UserController@show']);
            $api->put('/{user}', ['as' => 'users.update', 'uses' => 'UserController@update']);
            $api->delete('/{user}', ['as' => 'users.delete', 'uses' => 'UserController@delete']);

            $api->put('/{user}/update-password', ['uses' => 'userController@updatePassword']);
            $api->get('/{user}/reset-password', ['as' => 'users.reset-password', 'uses' => 'UserController@resetPassword']);

            $api->group(['prefix' => '/{user}/riders', 'as' => 'users.'], function (Router $api) {
                $api->get('/', ['as' => 'riders.index', 'uses' => 'UserRiderController@index']);
                $api->post('/', ['as' => 'riders.store', 'uses' => 'UserRiderController@store']);
                $api->put('/{rider}', ['as' => 'riders.update', 'uses' => 'UserRiderController@update']);
            });
        });

        $api->group(['prefix' => 'riders'], function (Router $api) {
            $api->get('/', ['as' => 'riders.index', 'uses' => 'RiderController@index']);
            $api->get('/birthdays', ['as' => 'riders.birthdays', 'uses' => 'RiderController@birthdays']);
            $api->get('/{rider}', ['as' => 'riders.index', 'uses' => 'RiderController@show']);

            $api->get('/{rider}/rosters/{roster}', ['uses' => 'RiderController@getSubscription']);
        });

        $api->group(['prefix' => 'formentries'], function (Router $api) {
            $api->get('/', ['as' => 'formentries.index', 'uses' => 'FormEntryController@index']);
            $api->post('/', ['as' => 'formentries.store', 'uses' => 'FormEntryController@store']);
            $api->get('/{form_entry}', ['as' => 'formentries.show', 'uses' => 'FormEntryController@show']);
            $api->delete('/{form_entry}', ['as' => 'formentries.delete', 'uses' => 'FormEntryController@delete']);

            $api->post('/{form_entry}/read', ['as' => 'formentries.read', 'uses' => 'FormEntryController@read']);
        });

        $api->group(['prefix' => 'announcements', 'as' => 'announcements.'], function (Router $api) {
            $api->get('/', ['as' => 'index', 'uses' => 'AnnouncementController@index']);
        });

        $api->group(['prefix' => 'admin/announcements', 'as' => 'admin.announcements.'], function(Router $api) {
            $api->get('/', ['as' => 'index', 'uses' => 'Admin\AnnouncementController@index']);
            $api->post('/', ['as' => 'store', 'uses' => 'Admin\AnnouncementController@store']);
            $api->delete('/{announcement}', ['as' => 'delete', 'uses' => 'Admin\AnnouncementController@delete']);
        });
    });
});
