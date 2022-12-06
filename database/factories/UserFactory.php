<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\{Generator as Faker, Factory} ;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $faker2 = Factory::create();
    $faker2->addProvider(new Sabbir\Faker\AvatarProvider($faker2));
    $name = $faker->name;
    $days = ['M', 'T', 'W', 'Th', 'F', 'S', 'Su'];

    return [
        'name' => $name,
        'lastname' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'avatar'=> $faker2->avatarUrl('personas', null, Str::slug($name)),
        'slug' => Str::slug($name),
        'phone' => $faker->e164PhoneNumber(),
        'birthday_date' => $faker->dateTimeThisCentury(),
        'presentation' => $faker->realText(250),
        'detailed_description' => $faker->realText(500),
        'is_available' => $faker->boolean(),
        'business_days' => implode($faker->randomElements($days, $faker->numberBetween(0, count($days)))),
    ];
});
