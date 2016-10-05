<?php

namespace Controllers\Admin;

/**
 * Admin Authentication page
 */
class AuthController extends BaseController
{
  public function index()
  {
    $this->renderer->render("index");
  }

  public function auth($username, $password)
  {

  }
}
