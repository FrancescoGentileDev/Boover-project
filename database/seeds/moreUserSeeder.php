<?php

use Illuminate\Database\Seeder;

class moreUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call(UserSeeder::class);
        $this->call(SkillUserSeeder::class);
        $this->call(SponsorUserSeeder::class);
    }
}
