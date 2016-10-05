<?php

/**
 *  Please, don't edit this file
 */
namespace Controllers\Admin;

use Components\Renderer;

class BaseController
{
  protected $renderer;
  protected $params;

  function __construct($target = "index", $params = [])
  {
    //check session if admin, if not redirect to adminLogin page
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

  public function errorNotFound()
  {
    $this->renderer->renderFromFile("../views/default/404.tpl");
  }

}
