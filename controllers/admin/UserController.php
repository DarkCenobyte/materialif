<?php

namespace Controllers\Admin;

/**
 * Users settings page
 */
class UserController extends BaseController
{
  public function index()
  {
    $this->renderer->render("index", [
      "stat_posts" => 1,
      "stat_users" => 1
    ]);
  }
}
