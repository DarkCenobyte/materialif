<?php

namespace Models;

class RightsLevel extends BaseModel
{
  protected $table = 'rights_levels';
  public $timestamps = false;

  public function rank()
  {
    return $this->hasOne('Models\Rank');
  }

  public function category()
  {
    return $this->hasOne('Models\Category');
  }

}
