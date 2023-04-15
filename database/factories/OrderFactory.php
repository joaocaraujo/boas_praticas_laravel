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

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(['delivered', 'pending', 'cancel']),
        'paid' => $faker->boolean(50),
        'track_code' => md5(uniqid(rand(), true))
    ];
});
