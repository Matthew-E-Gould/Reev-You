<?php

use Illuminate\Database\Seeder;
use App\Game;

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
      Game::create([
        'title' => 'GAME '.strval($i),
        'description' => 'GAME DESCRIPTION HERE'
      ]);
    }

  }
}
