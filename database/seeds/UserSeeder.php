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
    $admin = new User();
    $admin->name = 'admin';
    $admin->password = bcrypt('IamAnAdmin');
    $admin->email = 'admin@admin.it';
    $admin->save();


    $numUsers = 30;
    $users = factory(App\User::class, $numUsers)->create();

    foreach ($users as $user) {
        $user->avatar = $this->getAvatar($user->id);
        $user->save();
    }
  }

  private function getAvatar($id) {
    $gender = ['men', 'women'];
    $baseUrl = 'https://randomuser.me/api/portraits/';

    return $baseUrl . $gender[rand(0,1)] . '/'. $id . '.jpg';
  }
}
