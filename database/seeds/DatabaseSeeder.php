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

        // $this->call(UsersTableSeeder::class);
        // $this->call(InboxesTableSeeder::class);



        // $this->call(UserSeeder::class);
        // $this->call(InboxSeeder::class);


        $this->call(CategoryTableSeeder::class);
        $this->call(SkillSeeder::class);
        // $this->call(SkillUserSeeder::class);
        // $this->call(SponsorSeeder::class);
        // $this->call(SponsorUserSeeder::class);
        // $this->call(ReviewSeeder::class);
        $this->call(RealUserSeeder::class);

    }


}
