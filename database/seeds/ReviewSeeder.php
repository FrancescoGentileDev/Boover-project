<?php

use Illuminate\Database\Seeder;
use App\models\Review;
use App\User;

class ReviewSeeder extends Seeder
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
            $reviews = factory(App\models\Review::class, rand(0, 10))->make();
            foreach($reviews as $review) {
                $review->user_id = $user->id;
                $review->save();
            }
        }
    }
}
