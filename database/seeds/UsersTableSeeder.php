<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'Tezza',
      'email' => 'Terry@terryland.com',
      'password' => 'pass',
      'classification' => 0,
      'real_name' => 'Terry'
    ]);
  }
}
