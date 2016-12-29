<?php

namespace Controllers;

/**
 *
 */
use Models\Category;
use Models\Thread;

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
