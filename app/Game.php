<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
  protected $fillable = ['title', 'description'];

  public function review(){
    return $this->hasMany(Review::class);
  }
}
