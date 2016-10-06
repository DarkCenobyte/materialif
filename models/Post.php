<?php

namespace Models;

class Posts extends BaseModel
{
  protected $table = 'posts';

  public function author()
  {
    return $this->hasOne('Models\Authors');
  }

  public function thread()
  {
    return $this->hasOne('Models\Threads');
  }
  
}
