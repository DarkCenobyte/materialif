<?php

namespace Controllers\Admin;

/**
 * Admin index page, should be used to display some statistics about the forum
 */
class IndexController extends BaseController
{
  public function index()
  {
    $this->renderer->render("index", [
      "stat_posts" => 1,
      "stat_users" => 1
    ]);
  }
}
