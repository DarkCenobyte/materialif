<?php

/**
 *  Please, don't edit this file
 */
namespace Controllers;

use Components\Renderer;
use Components\Redirect;

class BaseController
{
  protected $renderer;
  protected $redirect;
  protected $params;

  function __construct($target = "index", $params = null)
  {
    $this->renderer = new Renderer(get_class($this));
    $this->redirect = new Redirect("Controllers\\");
    if (
      in_array(
        $target,
        get_class_methods($this)
      )
    ) {
      $this->params = $params;
      if (is_array($this->params)) {
        foreach ($this->params as &$value) {
          if (empty($value)) {
            $value = null;
          }
        }
        call_user_func_array([$this, $target], $this->params);
      } else {
        call_user_func([$this, $target]);
      }
    } else {
      $this->errorNotFound();
    }
  }

  private function errorNotFound()
  {
    $this->renderer->renderFromFile("views/default/404.tpl");
  }

}
