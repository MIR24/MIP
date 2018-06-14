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

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'published_at' => $faker->dateTimeThisMonth('2018-12-30 21:00:00', 'Europe/Moscow'),
        'user_id' => $faker->numberBetween(1, 10),
        'name' => $faker->word,
        'description_short' => $faker->paragraph(3, true),
        'description_long' => $faker->paragraph(6, true),
        'url' => $faker->url,
        'status' => 'inactive',
        'image_url' => $faker->imageUrl(640, 480, 'cats'),
    ];
});
