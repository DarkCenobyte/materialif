<?php

require_once("../vendor/autoload.php");
use Components\Renderer;

$renderer = new Renderer(null);
$renderer->renderFromFile("install.tpl");
