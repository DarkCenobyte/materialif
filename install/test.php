<?php

require_once("../vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;

$res = [];

if (isset($_POST['dbForm'])) {
  $dbForm = $_POST['dbForm'];

  $capsule = new Capsule;
  $capsule->addConnection([
    'driver'    => $dbForm['driver'] ?? null,
    'host'      => $dbForm['server'] ?? null,
    'database'  => $dbForm['db-name'] ?? null,
    'username'  => $dbForm['db-user'] ?? null,
    'password'  => $dbForm['db-password'] ?? null,
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => $dbForm['db-prefix'] ?? null
  ]);

  $capsule->setAsGlobal();

  try {
    Capsule::connection()->getPdo();
  } catch (PDOException $e) {
    $res['status'] = false;
    $res['error'] = utf8_encode(
      $e->getMessage()
    );
    
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
