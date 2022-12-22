<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;


$factory->define(App\models\Review::class, function (Faker $faker) {

    $date = date('Y-m-d H:i:s', $faker->dateTimeBetween('-359 days', 'now')->getTimestamp());

    return [
        //
        'nickname' => $faker->userName(),
        'title' => $faker->realText(20),
        'description' => $faker->realText(250),
        'vote' => $faker->numberBetween(1, 5),
        'created_at' => $date,
    ];
});
