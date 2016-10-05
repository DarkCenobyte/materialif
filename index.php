<?php

require_once "vendor/autoload.php";
require_once "config/config.php";

$class = "Controllers\\" . (isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'IndexController');
$target = $_GET['t'] ?? "index";
$params = $_GET['p'] ?? null;

new $class($target, $params);
