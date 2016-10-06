<?php

namespace Models;

class Threads extends BaseModel
{
  protected $table = 'threads';

  public function author()
  {
    return $this->hasOne('Models\Authors')
  }

  public function category()
  {
    return $this->hasOne('Models\Categories');
  }

  public function status()
  {
    return $this->hasOne('Models\ThreadsStatus');
  }

  public function posts()
  {
    return $this->hasMany();
  }
}
