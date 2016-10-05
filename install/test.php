<?php

require_once("../vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;

$res = [];

if (isset($_POST['dbForm'])) {
  $dbForm = $_POST['dbForm'];

  define("DRIVER", $dbForm['driver']);
  define("HOST", $dbForm['server']);
  define("DATABASE", $dbForm['db-name']);
  define("USERNAME", $dbForm['db-user']);
  define("PASSWORD", $dbForm['db-password']);
  define("PREFIX", $dbForm['db-prefix']);

  $capsule = new Capsule;
  $capsule->addConnection([
    'driver'    => DRIVER,
    'host'      => HOST,
    'database'  => DATABASE,
    'username'  => USERNAME,
    'password'  => PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => PREFIX
  ]);

  $capsule->setAsGlobal();

  try {
    Capsule::connection()->getPdo();
  } catch (PDOException $e) {
    $res['status'] = false;
    $res['error'] = $e->getMessage();
    echo json_encode($res);

    return;
  }
  $manager = $capsule->getDatabaseManager();
  $manager->purge();

  $res['status'] = true;
  $res['error'] = null;
  echo json_encode($res);

  return;
}

$res['status'] = false;
$res['error'] = "Incorrect query";
echo json_encode($res);

return;
