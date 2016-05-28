<?php

use app\core\router\Router;
use app\core\router\Route;

Router::addRoute(new Route('basic:simple', array(new AllConstraint())));