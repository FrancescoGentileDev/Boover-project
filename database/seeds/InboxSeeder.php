<?php

use Illuminate\Database\Seeder;
use App\User;

class InboxSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $numUsers = count(User::all());

      $inboxes = factory(App\models\Inbox::class, $numUsers * 50)->create();
      foreach ($inboxes as $inbox) {
          $inbox->save();
      }
    }
}
