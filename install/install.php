<?php

require_once("../vendor/autoload.php");

use Components\Renderer;
use Models\Users;
use Models\Ranks;
use Models\RightsLevels;

if (isset($_POST['dbForm']) && isset($_POST['adminForm'])) {
  $dbForm = $_POST['dbForm'];
  $adminForm = $_POST['adminForm'];

  $configFile = file_get_contents("config.sample.php");

  $configFile = str_replace("<*DRIVER*>", '"' . $dbForm['driver'] . '"', $configFile);
  $configFile = str_replace("<*HOST*>", '"' . $dbForm['server'] . '"', $configFile);
  $configFile = str_replace("<*DATABASE*>", '"' . $dbForm['db-name'] . '"', $configFile);
  $configFile = str_replace("<*USERNAME*>", '"' . $dbForm['db-user'] . '"', $configFile);
  $configFile = str_replace("<*PASSWORD*>", '"' . $dbForm['db-password'] . '"', $configFile);
  $configFile = str_replace("<*PREFIX*>", '"' . $dbForm['db-prefix'] . '"', $configFile);

  file_put_contents("../config/config.php", $configFile, LOCK_EX);
  require("../config/config.php");
  require("dbCreate.php");

  /**
   * Init database content
   */
  $rank = new Ranks();
  $rank->name = "Administrator";
  $rank->save();

  $rights = new RightsLevels();
  $rights->can_read = true;
  $rights->can_write = true;
  $rights->can_moderate = true;
  $rights->is_admin = true;
  $rights->rank_id = 1;
  $rights->save();

  $admin = new Users();
  $admin->username = $adminForm['admin-username'];
  $admin->email = $adminForm['admin-email'];
  $admin->password = password_hash($adminForm['admin-pwd'], PASSWORD_DEFAULT);
  $admin->rank_id = 1;
  $admin->save();

}

$renderer = new Renderer(null);
$renderer->renderFromFile("install.tpl");
