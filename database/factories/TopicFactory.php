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
        'video_id' => factory('App\Video')->create()->id,
        'user_id' => factory('App\User')->create()->id,
        'name' => $faker->word,
        'description_short' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'description_long' => $faker->paragraph($nbSentences = 6, $variableNbSentences = true),
        'url' => $faker->url,
    ];
});
