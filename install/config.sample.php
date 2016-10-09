<?php

session_start([
  'cookie_lifetime' => 86400,
  'use_strict_mode' => true
]);

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

if (!defined("BASE_URL")) {
  define("BASE_URL", <*BASEURL*>);
}
if (!defined("URL_REWRITER_ACTIVATED")) {
  //Set this constant to true to enable url rewriting
  define("URL_REWRITER_ACTIVATED", false);
}
date_default_timezone_set('UTC');
