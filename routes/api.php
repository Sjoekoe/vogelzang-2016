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
    });
});
