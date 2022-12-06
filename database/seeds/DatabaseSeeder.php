<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->password = '$2y$10$9g6Jf09cuegp1SnkkDMdteUnLnUuL.0TJJZKykT0BsoOJcvIw2Wei';
        $admin->email = 'admin@admin.it';
        $admin->save();
        // $this->call(UsersTableSeeder::class);
        // $this->call(InboxesTableSeeder::class);
        $users = factory(App\User::class, 50)->create();
        foreach ($users as $user) {
            $user->avatar = $this->getAvatar($user->id);
            $user->save();
        }
        $inboxes = factory(App\models\Inbox::class, 30)->create();
        foreach ($inboxes as $inbox) {
            $inbox->save();
        }
        $this->call(CategoryTableSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(SkillUserSeeder::class);
        $this->call(SponsorSeeder::class);
        $this->call(SponsorUserSeeder::class);


    }
    public function getAvatar($id) {
        $gender = ['men', 'women'];
        $baseUrl = 'https://randomuser.me/api/portraits/';

        return $baseUrl . $gender[rand(0,1)] . '/'. $id . '.jpg';


    }

}
