<?php

require_once "vendor/autoload.php";
require_once "config/config.php";

$class = "Controllers\\" . (isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'IndexController');
$target = $_GET['t'] ?? "index";
$params = $_GET['p'] ?? $_POST['p'] ?? null;
var_dump($_SERVER['QUERY_STRING']);
var_dump($_GET);die;
if (class_exists($class, true)) {
  new $class($target, $params);
} else {
  new Controllers\BaseController(null, null);
}
