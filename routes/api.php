<?php

use Dingo\Api\Routing\Router;

$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['namespace' => 'App\\Api\\Http\\Controllers\\', 'middleware' => 'bindings'], function (Router $api) {
        $api->group(['prefix' => 'rosters'], function (Router $api) {
            $api->get('/', ['as' => 'rosters.index', 'uses' => 'RosterController@index']);
            $api->post('/', ['as' => 'rosters.store', 'uses' => 'RosterController@store']);
            $api->get('/{roster}', ['as' => 'rosters.show', 'uses' => 'RosterController@show']);
            $api->put('/{roster}', ['as' => 'rosters.update', 'uses' => 'RosterController@update']);
            $api->delete('/{roster}', ['as' => 'rosters.delete', 'uses' => 'RosterController@delete']);
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
    });
});
