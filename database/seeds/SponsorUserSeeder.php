<?php

use Illuminate\Database\Seeder;
use App\User;
use App\models\Sponsor;
class SponsorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all()->random(4);

        foreach($users as $user) {
            $sponsor = Sponsor::inRandomOrder()->first();
            $newDate = date("Y-m-d H:i:s", strtotime("+{$sponsor->duration} hours"));
            $user->sponsors()->attach($sponsor->id, ['expire_date' => $newDate, 'created_at' => date('Y-m-d H:i:s')]);
        }

    }
}
