<?php

/* Include core files */
require_once 'core/AppKernel.php';
require_once 'core/router/ConstrainsInterface.php';
require_once 'core/router/Route.php';
require_once 'core/router/Router.php';
require_once 'core/controller/Controller.php';
require_once 'core/router/constraints/AllConstraint.php';

/* Include User files */
require_once __DIR__.'/../src/Controllers/BasicController.php';

/* Include config files */
try {
    require_once 'config/routing.php';
} catch (Exception $e) {
    echo $e->getMessage()."\n";
}
