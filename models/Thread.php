<?php

namespace Models;

class Thread extends BaseModel
{
  protected $table = 'threads';

  public function author()
  {
    return $this->hasOne('Models\Author');
  }

  public function category()
  {
    return $this->hasOne('Models\Category');
  }

  public function status()
  {
    return $this->hasOne('Models\ThreadsStatus');
  }

  public function posts()
  {
    return $this->hasMany('Models\Post');
  }
}
