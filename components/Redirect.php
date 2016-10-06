<?php

namespace Components;

class Redirect
{
  public static function to($name)
  {
    $controllerName = ucfirst($name) . "Controller";
    return new $controllerName();
  }
}
