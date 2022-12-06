<?php
use App\User;
use App\models\Skill;
use Illuminate\Database\Seeder;

class SkillUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();

        foreach($users as $user) {
           $skill = Skill::all()->random(1);
           $user->skills()->attach($skill);
        }



    }
}
