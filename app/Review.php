<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['game_id', 'user_id', 'heading', 'content', 'recommend'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function game(){
      return $this->belongsTo(Game::class);
    }
}
