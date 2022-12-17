<?php

use App\models\Skill;
use App\models\Sponsor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Faker\{Generator as Faker, Factory} ;

class moreUserSeeder extends Seeder
{

    public function run(Faker $faker)
    {
        $numUsers = 30;
/**
 * 1. SEEDER PER UTENTI MASSIVI CON FOTO IN HIGH RESOLUTION PER POTERLO USARE FAI QUANTO SCRITTO QUI:
 * https://stackoverflow.com/questions/29822686/curl-error-60-ssl-certificate-unable-to-get-local-issuer-certificate
 */

    $users = factory(App\User::class, $numUsers)->create();
    $counter = 0;
    $response = Http::get('https://api.unsplash.com/collections/bgUOqY7aKYc/photos?client_id=qKINWkFarjQ8ED77O1eG7a7wfRWefn84O6iP14eRXDw&per_page=30');
    $response->json();
    $photos = json_decode($response->body());
    $page = 1;
    foreach ($users as $user) {
    if($counter == 30) {
        $response = Http::get('https://api.unsplash.com/collections/bgUOqY7aKYc/photos?client_id=qKINWkFarjQ8ED77O1eG7a7wfRWefn84O6iP14eRXDw&per_page=30&page=' . $page);
        $response->json();
        $photos = json_decode($response->body());
        $page++;
        $counter = 0;
    }



    $user->avatar = $photos[$counter]->urls->regular;
    $user->save();
    $counter++;

    }

    foreach($users as $user) {
        $inboxes = factory(App\models\Inbox::class, rand(15, 25))->make();
        foreach($inboxes as $inbox) {
            $inbox->user_id = $user->id;
            $inbox->save();
        }
    }

    foreach($users as $user) {
        $skill = Skill::all()->random(rand(1, 5));
        $user->skills()->attach($skill);
     }

    foreach($users as $user) {
        $reviews = factory(App\models\Review::class, rand(15, 25))->make();
        foreach($reviews as $review) {
            $review->user_id = $user->id;
            $review->save();
        }
    }














  }

  private function getAvatar() {

    $response = Http::get('https://api.unsplash.com/photos/random?client_id=uZVvRrXQ1z87M5Vof8pjkfQgVpR7Z9Y5VJ0aEQunt0s&query=random-person');
    $randomPhoto = $response->json();
    return $randomPhoto['urls']['regular'];
  }

}

