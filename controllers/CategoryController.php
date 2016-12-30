<?php

namespace Controllers;

/**
 *
 */
use Models\Category;
use Models\Thread;

class CategoryController extends BaseController
{
  public function index()
  {
    // 404
  }

  public function view($categoryId)
  {
    $category = Category::find($categoryId);
    if (isset($category)) {
      $threads = $category->threads->take(15)->get();
      //TODO: count $threads (for page later) and do the view rendering
    } else {
      $this->index();
      exit;
    }
  }
}
