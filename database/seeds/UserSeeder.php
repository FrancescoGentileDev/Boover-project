<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {


    $numUsers = 50;
    $users = factory(App\User::class, $numUsers)->create();

    foreach ($users as $user) {
        $user->avatar = $this->getAvatar($user->id);
        $user->save();
    }
  }

  private function getAvatar($id) {
    if($id > 99) {
      $id = $id % 100;
    }
    $gender = ['men', 'women'];
    $baseUrl = 'https://randomuser.me/api/portraits/';

    return $baseUrl . $gender[rand(0,1)] . '/'. $id . '.jpg';
  }
}
