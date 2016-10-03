<?php

namespace Controllers;

/**
 *
 */
class IndexController extends BaseController
{
  public function index()
  {
    //echo "Hello, World...";
    $this->renderer->render("index");
  }
}
