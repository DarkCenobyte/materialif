<?php

namespace Models;

class Category extends BaseModel
{
  protected $table = 'categories';
  public $timestamps = false;

  public function threads()
  {
    return $this->hasMany('Models\Thread');
  }

}
