<?php

namespace Controllers\Admin;

/**
 * Ranks settings page
 */
class RankController extends BaseController
{
  public function index()
  {
    $this->renderer->render("index", [
      "stat_posts" => 1,
      "stat_users" => 1
    ]);
  }
}
