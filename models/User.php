<?php

namespace Models;

class Users extends BaseModel
{
  protected $table = 'users';

  public function rank()
  {
    return $this->hasOne('Models\Ranks');
  }
  
}
