<?php

namespace Models;

class Thread extends BaseModel
{
  protected $table = 'threads';

  public function author()
  {
    return $this->belongsTo('Models\User', 'author_id', 'id');
  }

  public function category()
  {
    return $this->hasOne('Models\Category');
  }

  public function status()
  {
    return $this->hasOne('Models\ThreadsStatus');
  }

  public function posts()
  {
    return $this->hasMany('Models\Post');
  }
}
