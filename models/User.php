<?php

namespace Models;

class User extends BaseModel
{
  protected $table = 'users';

  public function rank()
  {
    return $this->hasOne('Models\Rank');
  }

}
