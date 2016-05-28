<?php

use app\core\router\RouteConstraint;

class AllConstraint implements RouteConstraint
{
    public function check($arg)
    {
        return true;
    }
}