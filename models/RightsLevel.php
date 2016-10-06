<?php

namespace Models;

class RightsLevels extends BaseModel
{
  protected $table = 'rights_levels';
  public $timestamps = false;

  public function rank()
  {
    return $this->hasOne('Models\Ranks');
  }

  public function category()
  {
    return $this->hasOne('Models\Categories');
  }

}
