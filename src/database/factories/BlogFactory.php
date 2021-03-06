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


$factory->define(\App\Models\Lerova\Blog::class, function (Faker $faker) {

    return [

        'uuid' => substr(base_convert(md5(microtime()), 16,32), 0, 12),

        'page_id' => function()
        {
            return factory(\App\Models\Lerova\Page::class)->create()->id;
        },

        'author_id' => function()
        {
            return factory(\App\User::class)->create()->id;
        },


        'title' => $faker->text(30),
        'teaser' => $faker->text(150),
        'body' => $faker->paragraph(4, true),

        'tags' => json_encode($faker->words('10')),

        'image' => $faker->imageUrl(1920, 1080),

        'published' => false,


    ];
});
