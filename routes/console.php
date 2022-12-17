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
    $response = Http::get('https://api.unsplash.com/photos/random?client_id=TbKwMVqRg3nJ2vtMTzCyKY03mouvjmVj1YRvOf3U2Tw&query=random-person&count=30');
    $response->json();

    $photos = json_decode($response->body());
    $counter = 0;
    $photos[0]->urls->regular;



});
