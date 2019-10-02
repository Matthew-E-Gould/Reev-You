<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  public function game(){
    return $this->belongsTo(Game::class);
  }

  public function rator(){
    return $this->belongsTo(User::class);
  }
}
