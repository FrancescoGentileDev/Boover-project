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
        $users = User::where('id' , '>', 295)->get();
        foreach($users as $user) {
            $inboxes = factory(App\models\Inbox::class, rand(10, 25))->make();
            $user->inboxes()->saveMany($inboxes);
        }
    }
}
