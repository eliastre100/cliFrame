<?php

namespace app\core\router;

class Route
{
    private $controller;
    private $action;
    private $constraints;

    public function __construct($actions, $constraints = array())
    {
        $routeParams = explode(':', $actions);
        if (count($routeParams) < 2)
            throw new \Exception('Route '.$actions.' have a wrong size of arguments');
        $this->controller = $routeParams[0].'Controller';
        $this->action = $routeParams[1].'Action';
        if (!class_exists('basicController'))
            throw new \Exception("Class ".$this->controller." does not exit but is required for route ".$actions);
        if (!method_exists($this->controller, $this->action))
            throw new \Exception('Class '.$this->controller.' does not have an '.$this->action.' method');
        if (!is_array($constraints))
            throw new \Exception('Constraints have to be an array of class which implement RouteConstraint interface');
        foreach ($constraints as $constraint) {
            if (!in_array('app\core\router\RouteConstraint', class_implements($constraint)))
                throw new \Exception("Contraints have to be instance of class which implement RouteConstraint");
        }
        $this->constraints = $constraints;
    }

    public function match($args)
    {
        if (count($this->constraints) != count($args))
            return false;
        foreach ($args as $key => $arg) {
            if (!$this->constraints[$key]->check($arg))
                return false;
        }
        return true;
    }

    public function execute()
    {
        $action = $this->action;
        return $this->controller->$action();
    }
}