<?php

session_start();

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Database configuration
 */

$capsule = new Capsule;
$capsule->addConnection([
  'driver'    => <*DRIVER*>,
  'host'      => <*HOST*>,
  'database'  => <*DATABASE*>,
  'username'  => <*USERNAME*>,
  'password'  => <*PASSWORD*>,
  'charset'   => 'utf8',
  'collation' => 'utf8_general_ci',
  'prefix'    => <*PREFIX*>
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
date_default_timezone_set('UTC');
