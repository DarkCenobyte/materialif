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

  public function parent()
  {
    return $this->belongsTo('Category', 'parent_id');
  }

  public function children()
  {
    return $this->hasMany('Category', 'parent_id');
  }

}
