<?php

/**
 *  Please, don't edit this file
 */
namespace Controllers;

use Components\Renderer;

class BaseController
{
  protected $renderer;

  function __construct()
  {
    $this->renderer = new Renderer(get_class($this));
    $this->index();
  }

  public function index()
  {
    echo "404";
  }

}
