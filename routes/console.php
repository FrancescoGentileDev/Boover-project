<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\models\Skill;
use Faker\Generator as Faker;
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

Artisan::command('skilltest', function (Faker $faker) {
    $skills = [
        ['Gaming', 'Brand Identity', 'Social Media', 'Moda e Accessori'], // Grafica e Design
        ['Pubbliche Relazioni', 'E-Commerce', 'Web Analytics', 'Display Advertising'], // Marketing
        ['Blog Post', 'Traduzione di Testi', 'Scrittura Creativa', 'Case Study'], // Scrittura e Traduzione
        ['Produttori e Compositori', 'Cantanti e Vocalist', 'Mixaggio DJ', 'Produzione Audiolibri'], // Musica e Audio
        ['Sviluppo Siti Web', 'Sviluppo Videogiochi', 'Sicurezza Informatica', 'Blockchain e Criptovalute'], // Programmazione e Tecnologia
        ['Life Coaching', 'Fitness e Benessere', 'Lezioni di Cucina', 'Fotografia'], // Lifestyle
        ['Fisioterapia', 'Psicologia e Psicoterapia', 'Dietologia', 'Medicina Generale'], // Medicina e Salute
        ['Sport di Squadra', 'Discipline Olimpiche', 'Lezioni di Scacchi', 'Sport Invernali'], // Sport e Hobby
        ['Altro'], // Altro
    ];
    foreach($skills as $skill=> $groups) {

        foreach($groups as $group) {

        };
    }
});
