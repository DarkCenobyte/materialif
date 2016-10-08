<?php

namespace Controllers\Admin;

/**
 * Categories settings page
 */
class CategoryController extends BaseController
{
  public function index()
  {
    $this->renderer->render("index", [
      "stat_posts" => 1,
      "stat_users" => 1
    ]);
  }
}
