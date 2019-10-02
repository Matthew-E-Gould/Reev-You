<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  protected $fillable = [
      'user_id', 'following_id'
  ];

  public function following(){
    return $this->belongsTo(User::class, 'following_id');
  }
}
