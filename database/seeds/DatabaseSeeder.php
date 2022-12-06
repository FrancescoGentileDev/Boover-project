<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(InboxesTableSeeder::class);
        $users = factory(App\User::class, 50)->create();
        foreach ($users as $user) {
            $user->save();
        }
        $inboxes = factory(App\models\Inbox::class, 30)->create();
        foreach ($inboxes as $inbox) {
            $inbox->save();
        }
        $this->call(CategoryTableSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(SkillUserSeeder::class);



    }
}
