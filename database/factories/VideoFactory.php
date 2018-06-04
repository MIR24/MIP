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

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'cdn_id' => $faker->md5,
        'cdn_name' => $faker->word.$faker->fileExtension,
        'cdn_path' => '/'.$faker->word,
        'cdn_size' => $faker->randomNumber($nbDigits = null, $strict = false),
        'cdn_content_type' => $faker->mimeType,
        'cdn_create_date' => $faker->dateTimeThisCentury->format('d.m.Y\TH:i:s'),
        'cdn_latest_update' => '',
        'cdn_resource_url' => $faker->url,
        'cdn_cdn_url' => $faker->url,
        'cdn_vod_hls' => $faker->url,
        'cdn_video' => $faker->url,
        'cdn_private' => false,
        'cdn_status' => "ok"
    ];
});
