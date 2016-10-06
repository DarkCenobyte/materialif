<?php

namespace Components;

class Redirect
{
  private $parentNamespace;

  function __construct($parentNamespace)
  {
    $this->parentNamespace = $parentNamespace;
  }

  public function to($name)
  {
    $controllerName = $this->parentNamespace . ucfirst($name) . "Controller";
    return new $controllerName();
  }
}
