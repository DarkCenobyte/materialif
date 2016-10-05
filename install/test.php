<?php

require_once("../vendor/autoload.php");

if (isset($_POST['dbForm'])) {
  $dbForm = $_POST['dbForm'];

  define("DRIVER", $dbForm['driver']);
  define("HOST", $dbForm['server']);
  define("DATABASE", $dbForm['db-name']);
  define("USERNAME", $dbForm['db-user']);
  define("PASSWORD", $dbForm['db-password']);
  define("PREFIX", $dbForm['db-prefix']);

  return echo 0;
}

return echo 1;
