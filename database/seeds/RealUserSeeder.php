<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RealUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //



        $json = file_get_contents(base_path('public\user2.json'));
        $array = json_decode($json, true);
        $collections = collect($array['users']);

        $collections = $collections->map(function ($collection) use ($faker) {
            $collection['email'] = $faker->unique()->safeEmail;
            $collection['email_verified_at'] = $faker->dateTimeBetween('-100 days', 'now');
            $collection['password'] = '$2y$10$pZQQkjW4qrRtrO.aloJnlu/shlQXJIkeIanFJxKiYMO8ULn.4S5uS';
            $collection['remember_token'] = Str::random(10);
            $collection['slug'] = getSluggus($collection['name'] . ' ' . $collection['lastname']);
            $collection['phone'] = $faker->e164PhoneNumber();
            $collection['birthday_date'] = $faker->dateTimeBetween('-50 years', '-18 years');
            $collection['detailed_description'] = $faker->realText(500);
            $collection['is_available'] = 1;
            $collection['business_days'] = implode($faker->randomElements(['M', 'T', 'W', 'Th', 'F', 'S', 'Su'], $faker->numberBetween(0, 7)));

            return $collection;
        });


        // FEMALE
        $femaleResponse = Http::get('https://api.unsplash.com/collections/MjdP2GYVPn8/photos?client_id=qKINWkFarjQ8ED77O1eG7a7wfRWefn84O6iP14eRXDw&per_page=30');
        $femaleResponse->json();
        $femalePhotos = json_decode($femaleResponse->body());

        $counterFemale = 0;
        $pageFemale = 2;
        // MALE
        $maleResponse = Http::get('https://api.unsplash.com/collections/8551736/photos?client_id=uZVvRrXQ1z87M5Vof8pjkfQgVpR7Z9Y5VJ0aEQunt0s&per_page=30');
        $maleResponse->json();
        $malePhotos = json_decode($maleResponse->body());

        $counterMale = 0;
        $pageMale = 2;

        foreach($collections as $collection) {
            if ($counterFemale == 30) {
                $femaleResponse = Http::get('https://api.unsplash.com/collections/MjdP2GYVPn8/photos?client_id=qKINWkFarjQ8ED77O1eG7a7wfRWefn84O6iP14eRXDw&per_page=30&page=' . $pageFemale);
                $femaleResponse->json();
                $femalePhotos = json_decode($femaleResponse->body());
                $pageFemale++;
                $counterFemale = 0;
            }
            if ($counterMale == 30) {
                $maleResponse = Http::get('https://api.unsplash.com/collections/8551736/photos?client_id=uZVvRrXQ1z87M5Vof8pjkfQgVpR7Z9Y5VJ0aEQunt0s&per_page=30&page=' . $pageMale);
                $maleResponse->json();
                $malePhotos = json_decode($maleResponse->body());
                $pageMale++;
                $counterMale = 0;
            }

            dump($collection['name'] . ' ' . $collection['lastname'] . ' ' . $femalePhotos[$counterFemale]->urls->small );


            $user = User::make([
                'name' => $collection['name'],
                'lastname' => $collection['lastname'],
                'email' => $collection['email'],
                'email_verified_at' => $collection['email_verified_at'],
                'password' => $collection['password'],
                'remember_token' => $collection['remember_token'],
                'slug' => $collection['slug'],
                'phone' => $collection['phone'],
                'birthday_date' => $collection['birthday_date'],
                'presentation' => $collection['presentation'],
                'detailed_description' => $collection['detailed_description'],
                'is_available' => $collection['is_available'],
                'business_days' => $collection['business_days'],
            ]);


         if ($collection['gender'] === 'F') {
               $user->avatar = $femalePhotos[$counterFemale]->urls->regular;
                $counterFemale++;
            }
            if ($collection['gender'] === 'M') {
                $user->avatar = $malePhotos[$counterMale]->urls->regular;
                $counterMale++;
            }

            $user->save();
            //Attach SKILLS
            $user->skills()->attach($collection['skills']);
            //Attach INBOXES
            // $inboxes = factory(App\models\Inbox::class, rand(15, 25))->make();
            // $user->inboxes()->saveMany($inboxes);

            // $reviews = factory(App\models\Review::class, rand(15, 25))->make();
            // $user->reviews()->saveMany($reviews);
        }

    }
}

function getSluggus($fullname)
{
    $slug = Str::slug($fullname, '-');
    $slugBase = $slug;
    $userWithSlug = User::where('slug', $slug)->first();
    $counter = 1;
    while ($userWithSlug) {
        $slug = $slugBase . '-' . $counter;
        $counter++;
        $userWithSlug = User::where('slug', $slug)->first();
    }
    return $slug;
}



function getImages($gender)
{

}
