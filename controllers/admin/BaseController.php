<?php

/**
 *  Please, don't edit this file
 */
namespace Controllers\Admin;

use Components\Renderer;
use Components\Redirect;

class BaseController
{
  protected $renderer;
  protected $params;

  function __construct($target = "index", $params = [])
  {
    if (!isset($_SESSION['logged']) || !isset($_SESSION['isAdmin'])) {
      Redirect::to("auth");
      return;
    }
    $this->renderer = new Renderer(get_class($this), true);
    if (
      in_array(
        $target,
        get_class_methods($this)
      )
    ) {
      $this->params = $params;
      $this->$target();
    } else {
      $this->errorNotFound();
    }
  }

  private function errorNotFound()
  {
    $this->renderer->renderFromFile("../views/default/404.tpl");
  }

}
