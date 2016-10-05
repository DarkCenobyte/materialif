<?php

namespace Admin\Controllers;

/**
 *
 */
class IndexController extends BaseController
{
  public function index()
  {
    //echo "Hello, World...";
    $this->renderer->render("index", [
      "customName" => "DarkCenobyte",
      "customRank" => "Master"
    ]);
  }
}
