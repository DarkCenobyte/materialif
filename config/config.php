<?php

session_start();

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Database configuration
 */
$capsule = new Capsule;
$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'database'  => 'elyseum',
  'username'  => 'root',
  'password'  => '',
  'charset'   => 'utf8mb4',
  'collation' => 'utf8mb4_general_ci',
  'prefix'    => 'ely_'
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
date_default_timezone_set('UTC');

/**
 * Namespace Loading
 */
require_once('autoloader.php');
$loader = new \Config\Autoloader;
$loader->register();
$loader->addNamespace('Config', 'config');
//$loader->addNamespace('Controllers', '../controllers');
$loader->addNamespace('Components', 'components');
$loader->addNamespace('Controllers', 'controllers');
$loader->addNamespace('Models', 'models');
$loader->addNamespace('Install', 'install');

/**
 * Template engine loading (Smarty 3 don't match PSR-4 for autoloading)
 */
require_once('vendor/smarty/smarty/libs/Smarty.class.php');
