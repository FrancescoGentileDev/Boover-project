<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\User;
use App\models\Skill;
use Illuminate\Support\Collection;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('test', function (Faker $faker) {

    $fakeDate = $faker->dateTimeBetween('-100 days', 'now');
    $modified = $fakeDate;
    $modified = date_sub($modified, DateInterval::createFromDateString('1 year'));

    dump($fakeDate, $modified);

});
Artisan::command('test2', function (Faker $faker) {
    $json = file_get_contents(base_path('public\user2.json'));
    $array = json_decode($json, true);
    $users = collect($array['users']);

    $users = $users->map(function ($user) use ($faker) {

        $user['email'] = $faker->unique()->safeEmail;
        $user['email_verified_at'] = $faker->dateTimeBetween('-100 days', 'now');
        $user['password'] = '$2y$10$pZQQkjW4qrRtrO.aloJnlu/shlQXJIkeIanFJxKiYMO8ULn.4S5uS';
        $user['remember_token'] = Str::random(10);
        $user['slug'] = getSlugs($user['name'] . ' ' . $user['lastname']);
        $user['phone'] = $faker->e164PhoneNumber();
        $user['birthday_date'] = $faker->dateTimeBetween('-50 years', '-18 years');
        $user['detailed_description'] = $faker->realText(500);
        $user['is_available'] = 1;
        $user['business_days'] = implode($faker->randomElements(['M', 'T', 'W', 'Th', 'F', 'S', 'Su'], $faker->numberBetween(0, 7)));

        return $user;
    });

    $users = $users->map(function ($user) use ($faker) {
        $user['avatar'] = $faker->realText(20);
        return $user;
    });


    dump($users->toArray()[114]);
});

Artisan::command('test3', function (Faker $faker) {

    $users =  User::where('avatar', null)->get();

    foreach($users as $user) {
        $user->inboxes()->delete();
        $user->reviews()->delete();
        $user->skills()->sync([]);

        $user->delete();

    }


});


Artisan::command('natalia', function (Faker $faker) {
    $user = User::query()->where('email', 'natalia.bruni@boover.com')->first();

    $reviews = factory(App\models\Review::class, 80)->make();
    $user->reviews()->saveMany($reviews);

    $inboxes = factory(App\models\Inbox::class, 70)->make();
    $user->inboxes()->saveMany($inboxes);
    echo 'ok';
});


Artisan::command('nataliaRemove', function (Faker $faker) {
    $user = User::query()->where('email', 'natalia.bruni@boover.com')->first();

    $user->skills()->sync([]);
    $user->inboxes()->delete();
    $user->reviews()->delete();
    $user->sponsors()->sync([]);
    echo 'ok';
    $user->delete();
});
Artisan::command('removetest', function (Faker $faker) {
    $user = User::query()->where('email', 'zakary75@example.com')->first();

    $user->sponsors()->sync([]);
});
Artisan::command('ping', function (Faker $faker) {
    $startTime = microtime(true);

    $users = User::query()
    ->leftJoin('sponsor_user', 'users.id', '=', 'sponsor_user.user_id')
    ->leftJoin(DB::raw('(SELECT user_id, CEIL(AVG(vote)) as avg_vote FROM reviews GROUP BY user_id) as rv1'), 'users.id', '=', 'rv1.user_id')
    ->select('users.id', 'users.name', 'users.lastname', 'users.avatar', 'users.slug', 'users.phone', 'users.presentation', 'users.detailed_description', 'users.birthday_date', 'rv1.avg_vote')
    ->addSelect(DB::raw('IF(sponsor_user.expire_date > NOW(), 1, 0) as is_sponsorized'))
    ->groupBy('users.id', 'users.name', 'users.lastname', 'users.avatar', 'users.slug', 'users.phone', 'users.presentation', 'users.detailed_description', 'users.birthday_date', 'rv1.avg_vote', 'is_sponsorized')
    ->where('is_available', 1)
    ->orderBy('is_sponsorized', 'desc')->where('name', 'like', 'b%')->get();

    $endTime = microtime(true);
    $responseTime = $endTime - $startTime;

    $formattedResponseTime = number_format($responseTime, 3);
    echo "Tempo di risposta: {$formattedResponseTime} ms";
});
