<?php

namespace app\core\router;

class Router
{
    private static $routes;

    public static function addRoute(Route $route)
    {
        self::$routes[] = $route;
    }

    public static function getRoute($args, $status = 0)
    {
        foreach (self::$routes as $route)
        {
            if ($route->match($args))
                return $route;
        }
        throw new \Exception('No route matching for theses arguments', $status);
    }
}