<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\User;
use App\models\Skill;
use Illuminate\Support\Collection;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('test', function (Faker $faker) {

    $fakeDate = $faker->dateTimeBetween('-100 days', 'now');
    $modified = $fakeDate;
    $modified = date_sub($modified, DateInterval::createFromDateString('1 year'));

    dump($fakeDate, $modified);

});
Artisan::command('test2', function (Faker $faker) {
    $user = User::find(100);

    $user->inboxes()->count();

    dump($user->reviews()->count());

});
