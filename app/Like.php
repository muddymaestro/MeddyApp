<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  use recordFeedsTrait;
  
  public function likeable()
  {
    return $this->morphTo();
  }

  public function post()
  {
    return $this->belongsTo('App\Post');
  }

  public function comment()
  {
    return $this->belongsTo('App\Comment');
  }
    
}
