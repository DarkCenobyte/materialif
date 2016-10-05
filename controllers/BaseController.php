<?php

/**
 *  Please, don't edit this file
 */
namespace Controllers;

use Components\Renderer;

class BaseController
{
  protected $renderer;
  protected $params;

  function __construct($target = "index", $params = [])
  {
    $this->renderer = new Renderer(get_class($this));
    if (
      in_array(
        $target,
        get_class_methods($this)
      )
    ) {
      $this->$target();
    } else {
      $this->errorNotFound();
    }
  }

  public function errorNotFound()
  {
    $this->renderer->renderFromFile("views/default/404.tpl");
  }

}
