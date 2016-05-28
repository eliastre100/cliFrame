#!/usr/bin/env php
<?php

use app\core\AppKernel;

require_once "app/loader.php";

$app = New AppKernel();

try {
    var_dump(\app\core\router\Router::getRoute($argv));
} catch (Exception $e) {
    echo $e->getMessage()."\n";
}
