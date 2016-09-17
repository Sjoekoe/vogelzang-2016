<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Riders\EloquentRider;
use App\Rosters\EloquentRoster;
use App\Users\EloquentUser;
use Faker\Generator;

$factory->define(EloquentUser::class, function(Generator $faker) {
    return [];
});
$factory->define(EloquentRoster::class, function (Generator $faker) {
    return [];
});
$factory->define(EloquentRider::class, function (Generator $faker) {
    return [];
});
