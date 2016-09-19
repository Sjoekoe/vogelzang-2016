<?php

use Dingo\Api\Routing\Router;

$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['namespace' => 'App\\Api\\Http\\Controllers\\', 'middleware' => 'bindings', 'as' => 'api.'], function (Router $api) {
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
        });

        $api->group(['prefix' => 'riders'], function (Router $api) {
            $api->get('/', ['as' => 'riders.index', 'uses' => 'RiderController@index']);
            $api->get('/{rider}', ['as' => 'riders.index', 'uses' => 'RiderController@show']);
        });

        $api->group(['prefix' => 'formentries'], function (Router $api) {
            $api->get('/', ['as' => 'formentries.index', 'uses' => 'FormEntryController@index']);
            $api->post('/', ['as' => 'formentries.store', 'uses' => 'FormEntryController@store']);
            $api->get('/{form_entry}', ['as' => 'formentries.show', 'uses' => 'FormEntryController@show']);
            $api->delete('/{form_entry}', ['as' => 'formentries.delete', 'uses' => 'FormEntryController@delete']);
        });

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
});
