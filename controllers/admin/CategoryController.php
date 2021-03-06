<?php

namespace Controllers\Admin;

/**
 * Categories settings page
 */
use Models\Category;

class CategoryController extends BaseController
{
  public function index($page = 1)
  {
    //get list
    $categories = Category::skip(($page - 1) * 10)->take(10)->get();
    $allCategories = Category::all();
    $pageCount = ceil(Category::count() / 10);

    $this->renderer->render("index", [
      "categoriesList"   => $categories,
      "categoriesPCount" => $pageCount,
      "currentPage"      => $page,
      "allCategories"    => $allCategories
    ]);
  }

  public function add($name, $parent = null, $description = null)
  {
    $category = new Category();
    $category->name = $name;
    $category->description = $description;
    $category->parent_id = $parent;
    $category->save();

    $this->redirect->to("category");
  }

  public function edit($id, $name = null, $parent = null, $description = null)
  {
    $category = Category::find($id);
    $category->name = $name;
    $category->description = $description;
    $category->parent_id = ($id != $parent) ? $parent : null;
    $category->save();

    $this->redirect->to("category");
  }

  public function remove($id)
  {
    Category::destroy($id);

    $this->redirect->to("category");
  }
}
