<?php

require_once "vendor/autoload.php";
require_once "config/config.php";

if (URL_REWRITER_ACTIVATED) {
  //pretty url support
  if (isset($_GET['rd'])) {
    $url = explode('/', $_GET['rd']);
    $class = "Controllers\\" . ucfirst($url[0]) . 'Controller';
    $target = $url[1] ?? "index";
    $params = $_POST['p'] ?? null;
    for ($i=2; $i < count($url); $i+=2) {
      $params[$url[$i]] = $url[$i+1] ?? null;
    }
  } else {
    $class = "Controllers\IndexController";
    $target = "index";
    $params = null;
  }
} else {
  //classic params support
  $class = "Controllers\\" . (isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'IndexController');
  $target = $_GET['t'] ?? "index";
  $params = $_GET['p'] ?? $_POST['p'] ?? null;
}

if (class_exists($class, true)) {
  new $class($target, $params);
} else {
  new Controllers\BaseController(null, null);
}
