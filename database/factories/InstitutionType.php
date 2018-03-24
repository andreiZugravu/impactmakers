<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\InstitutionType::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3, true), 
        'icon_id' => (int)DB::table('icons')->min('id'),
    ];
});
