<?php

require_once "../vendor/autoload.php";
require_once "../config/config.php";

$class = "Controllers\Admin\\" . (isset($_GET['p']) ? ucfirst($_GET['p']) . 'Controller' : 'IndexController');
new $class();
