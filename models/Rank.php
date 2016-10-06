<?php

namespace Models;

class Rank extends BaseModel
{
  protected $table = 'ranks';
  public $timestamps = false;

  const ADMIN       = 1;
  const MODERATOR   = 2;
  const REGISTERED  = 3;
  const VISITOR     = 4;

  public function users()
  {
    return $this->hasMany('Models\User');
  }

}
