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

$factory->define(\App\Models\Lerova\Page::class, function (Faker $faker) {

    return [
        'type' => config('lerova.core.meta.type'),
        'language' => config('lerova.core.meta.language'),
        'title' => $faker->unique()->text(30),
        'description' => $faker->text(150),
        'keywords' => json_encode($faker->words('5')),
        'image' => $faker->imageUrl(1920, 1080),

    ];
});


