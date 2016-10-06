<?php

namespace Models;

class User extends BaseModel
{
  protected $table = 'users';

  public function rank()
  {
    return $this->hasOne('Models\Rank');
  }

  public function threads()
  {
    return $this->hasMany('Models\Thread');
  }

  public function posts()
  {
    return $this->hasMany('Models\Post');
  }

}
