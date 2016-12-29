<?php

namespace Models;

class Post extends BaseModel
{
  protected $table = 'posts';

  public function author()
  {
    return $this->belongsTo('Models\User', 'author_id', 'id');
  }

  public function thread()
  {
    return $this->hasOne('Models\Thread');
  }

}
