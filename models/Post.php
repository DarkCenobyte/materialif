<?php

namespace Models;

class Post extends BaseModel
{
  protected $table = 'posts';

  public function author()
  {
    return $this->hasOne('Models\Author');
  }

  public function thread()
  {
    return $this->hasOne('Models\Thread');
  }

}
