<?php

use App\models\Skill;
use App\models\Sponsor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class moreUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numUsers = 50;
    $users = factory(App\User::class, $numUsers)->create();

    foreach ($users as $user) {

        $user->avatar = $this->getAvatar();
        $user->save();
    }

    foreach($users as $user) {
        $inboxes = factory(App\models\Inbox::class, rand(10, 25))->make();
        foreach($inboxes as $inbox) {
            $inbox->user_id = $user->id;
            $inbox->save();
        }
    }

    foreach($users as $user) {
        $skill = Skill::all()->random(5);
        $user->skills()->attach($skill);
     }

     foreach($users as $user) {
        $sponsor = Sponsor::inRandomOrder()->first();
        $newDate = date("Y-m-d H:i:s", strtotime("+{$sponsor->duration} hours"));
        $user->sponsors()->attach($sponsor->id, ['expire_date' => $newDate, 'created_at' => date('Y-m-d H:i:s')]);
    }

    foreach($users as $user) {
        $reviews = factory(App\models\Review::class, rand(0, 10))->make();
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

