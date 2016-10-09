<?php

namespace Controllers\Admin;

/**
 * Ranks settings page
 */
use Models\Rank;

class RankController extends BaseController
{
  public function index($page = 1)
  {
    //get list
    $ranks = Rank::skip(($page - 1) * 10)->take(10)->get();
    $pageCount = ceil(Rank::count() / 10);

    $this->renderer->render("index", [
      "ranksList"   => $ranks,
      "ranksPCount" => $pageCount,
      "currentPage" => $page
    ]);
  }

  public function add($name)
  {
    //get list
    $ranks = Rank::skip(($page - 1) * 10)->take(10)->get();
    $pageCount = ceil(Rank::count() / 10);

    $this->renderer->render("index", [
      "ranksList"   => $ranks,
      "ranksPCount" => $pageCount,
      "currentPage" => $page
    ]);
  }

  public function edit($id, $name)
  {
    //get list
    $ranks = Rank::skip(($page - 1) * 10)->take(10)->get();
    $pageCount = ceil(Rank::count() / 10);

    $this->renderer->render("index", [
      "ranksList"   => $ranks,
      "ranksPCount" => $pageCount,
      "currentPage" => $page
    ]);
  }

  public function remove($id)
  {
    //get list
    $ranks = Rank::skip(($page - 1) * 10)->take(10)->get();
    $pageCount = ceil(Rank::count() / 10);

    $this->renderer->render("index", [
      "ranksList"   => $ranks,
      "ranksPCount" => $pageCount,
      "currentPage" => $page
    ]);
  }
}
