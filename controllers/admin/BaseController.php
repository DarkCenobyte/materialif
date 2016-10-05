<?php

/**
 *  Please, don't edit this file
 */
namespace Admin\Controllers;

use Components\Renderer;

class BaseController
{
  protected $renderer;

  function __construct()
  {
    $this->renderer = new Renderer(get_class($this), true);
    $this->index();
  }

  public function index()
  {
    echo "404";
  }

}
