<?php

use App\models\Sponsor;
use Illuminate\Database\Seeder;
class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sponsorLevels = [
            [
                'type' => 'Bronze',
                'duration' => '24',
                'price' => '2.99',
            ],
            [
                'type' => 'Silver',
                'duration' => '72',
                'price' => '5.99',
            ],
            [
                'type' => 'Gold',
                'duration' => '144',
                'price' => '9.99',
            ],

        ];
        foreach($sponsorLevels as $sponsorLevel => $level ) {
            $sponsor = new Sponsor();
            $sponsor->fill($level);
            $sponsor->save();
        }
    }
}
