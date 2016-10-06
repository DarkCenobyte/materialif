<?php

require_once("../vendor/autoload.php");

use Components\Renderer;
use Models\User;
use Models\Rank;
use Models\RightsLevel;
use Models\ThreadsStatus;
use Models\Category;
use Models\Thread;
use Models\Post;

if (isset($_POST['dbForm']) && isset($_POST['adminForm'])) {
  $dbForm = $_POST['dbForm'];
  $adminForm = $_POST['adminForm'];
  $baseUrl = str_replace("/install/install.php", "", $_SERVER['PHP_SELF']);

  $configFile = file_get_contents("config.sample.php");

  $configFile = str_replace("<*DRIVER*>", '"' . $dbForm['driver'] . '"', $configFile);
  $configFile = str_replace("<*HOST*>", '"' . $dbForm['server'] . '"', $configFile);
  $configFile = str_replace("<*DATABASE*>", '"' . $dbForm['db-name'] . '"', $configFile);
  $configFile = str_replace("<*USERNAME*>", '"' . $dbForm['db-user'] . '"', $configFile);
  $configFile = str_replace("<*PASSWORD*>", '"' . $dbForm['db-password'] . '"', $configFile);
  $configFile = str_replace("<*PREFIX*>", '"' . $dbForm['db-prefix'] . '"', $configFile);
  $configFile = str_replace("<*BASEURL*>", '"' . $baseUrl . '"', $configFile);

  file_put_contents("../config/config.php", $configFile, LOCK_EX);
  require("../config/config.php");
  require("dbCreate.php");

  /**
   * Init database content
   */

  //Ranks creation
  $ranksArray = ["Administrator", "Moderator", "Registered", "Visitor"];
  foreach ($ranksArray as $value) {
    $rank = new Rank();
    $rank->name = $value;
    $rank->save();
  }

  //Administrator Default Rights
  $rights = new RightsLevel();
  $rights->can_read = true;
  $rights->can_write = true;
  $rights->can_moderate = true;
  $rights->is_admin = true;
  $rights->rank_id = 1;
  $rights->save();

  //Moderator Default Rights
  $rights = new RightsLevel();
  $rights->can_read = true;
  $rights->can_write = true;
  $rights->can_moderate = true;
  $rights->is_admin = false;
  $rights->rank_id = 2;
  $rights->save();

  //Registered Default Rights
  $rights = new RightsLevel();
  $rights->can_read = true;
  $rights->can_write = true;
  $rights->can_moderate = false;
  $rights->is_admin = false;
  $rights->rank_id = 3;
  $rights->save();

  //Visitor Default Rights
  $rights = new RightsLevel();
  $rights->can_read = true;
  $rights->can_write = false;
  $rights->can_moderate = false;
  $rights->is_admin = false;
  $rights->rank_id = 4;
  $rights->save();

  //Admin creation
  $admin = new User();
  $admin->username = $adminForm['admin-username'];
  $admin->email = $adminForm['admin-email'];
  $admin->password = password_hash($adminForm['admin-pwd'], PASSWORD_DEFAULT);
  $admin->rank_id = 1;
  $admin->save();

  //Threads Status creation
  $thStatusArray = ["open", "locked", "invisible"];
  foreach ($thStatusArray as $value) {
    $threadStatus = new ThreadsStatus();
    $threadStatus->status = $value;
    $threadStatus->save();
  }

  //Sample content
  $category = new Category();
  $category->name = "Example Category";
  $category->description = "This is an example of category";
  $category->save();

  $thread = new Thread();
  $thread->title = "Welcome on your new forum";
  $thread->author_id = 1;
  $thread->category_id = 1;
  $thread->save();

  $post = new Post();
  $post->content = "Hello World!";
  $post->author_id = 1;
  $post->thread_id = 1;
  $post->save();

}

$renderer = new Renderer(null);
$renderer->renderFromFile("install.tpl");
