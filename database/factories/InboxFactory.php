<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Inbox;
use App\User;
use Faker\Generator as Faker;

$factory->define(Inbox::class, function (Faker $faker) {
    $date = date('Y-m-d H:i:s', $faker->dateTimeBetween('-359 days', 'now')->getTimestamp());
    return [
        'nickname' => $faker->userName(),
        'title' => $faker->realText(32),
        'content' => $faker->realText(300),
        'email' => $faker->safeEmail(),
        'phone' => $faker->e164PhoneNumber(),
        'created_at' => $date,
    ];
});
