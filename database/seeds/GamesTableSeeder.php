<?php

use Illuminate\Database\Seeder;
use App\Games;

class GamesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    for($i = 0; $i < 3; $i++){
      Games::create([
        'title' => 'GAME '.strval($i),
        'description' => 'GAME DESCRIPTION HERE'
      ]);
    }
    
  }
}
