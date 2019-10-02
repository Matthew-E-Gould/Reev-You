<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedGame extends Model
{
    protected $fillable = ['game_id', 'user_id'];

    public function game(){
      return $this->belongsTo(Game::class);
    }

    public function owner(){
      return $this->belongsTo(User::class);
    }
}
