<?php

/**
 *  Please, don't edit this file
 */
namespace Controllers;

class BaseController
{
  function __construct()
  {
    $this->index();
  }

  public function index()
  {
    echo "404";
  }

}
