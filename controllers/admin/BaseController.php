<?php

/**
 *  Please, don't edit this file
 */
namespace Controllers\Admin;

use Components\Renderer;
use Components\Redirect;

class BaseController
{
  //The controllers in the safe_zone don't require the admin auth (like login)
  const SAFE_ZONE = [
    "Controllers\Admin\AuthController"
  ];

  protected $renderer;
  protected $redirect;
  protected $params;

  function __construct($target = "index", $params = null)
  {
    $this->redirect = new Redirect("Controllers\Admin\\");
    if (
      !isset($_SESSION['isAdmin']) &&
      !in_array(get_class($this), self::SAFE_ZONE)
    ) {
      $this->redirect->to("auth");

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
      if (is_array($this->params)) {
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
    $this->renderer->renderFromFile("../views/default/404.tpl");
  }

}
