<?php

namespace app\core\router;

interface RouteConstraint
{
    public function check($arg);
}
