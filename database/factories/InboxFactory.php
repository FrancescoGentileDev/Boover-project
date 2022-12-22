<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Inbox;
use App\User;
use Faker\Generator as Faker;

$factory->define(Inbox::class, function (Faker $faker) {
    $numUsers = count(User::all());

    return [
        'nickname' => $faker->firstName(),
        'title' => $faker->realText(32),
        'content' => $faker->realText(300),
        'email' => $faker->safeEmail(),
        'phone' => $faker->e164PhoneNumber(),
        'user_id' => $faker->numberBetween(1, $numUsers),
        'created_at' => date('Y-m-d H:i:s', $faker->dateTimeBetween('-365 days', 'now')->getTimestamp()),
    ];
});
