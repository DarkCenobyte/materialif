<?php

namespace Controllers\Admin;

/**
 * Admin Authentication page
 */
class AuthController extends BaseController
{
  public function index()
  {
    $this->renderer->render("index", [
      "stat_posts" => 1,
      "stat_users" => 1
    ]);
  }

  public function auth($username, $password)
  {

  }
}
