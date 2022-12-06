<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;


$factory->define(App\models\Review::class, function (Faker $faker) {
    return [
        //
        'nickname' => $faker->name(),
        'title' => $faker->realText(20),
        'description' => $faker->realText(250),
        'vote' => $faker->numberBetween(1, 5),
    ];
});
