<?php

namespace Models;

class Ranks extends BaseModel
{
  protected $table = 'ranks';
  public $timestamps = false;

  const ADMIN       = 1;
  const MODERATOR   = 2;
  const REGISTERED  = 3;
  const VISITOR     = 4;

}
