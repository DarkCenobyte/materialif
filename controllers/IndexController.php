<?php

namespace Controllers;

/**
 *
 */
use Models\Category;

class IndexController extends BaseController
{
  public function index()
  {
    $categories = Category::all();
    $this->renderer->render("index", [
      "categories" => $categories
    ]);
  }
}
