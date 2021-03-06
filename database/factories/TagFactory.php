<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Tag::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    return [
        'name'  => $title,
        'slug'  => str_slug($title),
    ];
});