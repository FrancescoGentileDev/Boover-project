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

    $name = $faker->name;
    $lastname = $faker->lastName;

    $days = ['M', 'T', 'W', 'Th', 'F', 'S', 'Su'];

    return [
        'name' => $name,
        'lastname' => $lastname,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt($faker->word()),
        'remember_token' => Str::random(10),
        'slug' => getSlug($name . ' ' . $lastname),
        'phone' => $faker->e164PhoneNumber(),
        'birthday_date' => $faker->dateTimeThisCentury(),
        'presentation' => $faker->realText(250),
        'detailed_description' => $faker->realText(500),
        'is_available' => $faker->boolean(),
        'business_days' => implode($faker->randomElements($days, $faker->numberBetween(0, count($days)))),
    ];
});
 function getSlug($fullname) {
    $slug = Str::slug($fullname, '-');
    $slugBase = $slug;
    $userWithSlug = User::where('slug', $slug)->first();
    $counter = 1;
    while($userWithSlug) {
        $slug = $slugBase . '-' . $counter;
        $counter++;
        $userWithSlug = User::where('slug', $slug)->first();
    }
    return $slug;
}
