<?php

class Router
{

    public $routes;
	
	function __construct()
	{

		$routesPath = ROOT . '/config/routes.php';

        $this->routes = include($routesPath);

	}

	private function getUri()
	{
		if (!empty($_SERVER['REQUEST_URI'])) return trim($_SERVER['REQUEST_URI'], '/');

	}

	public function run()
	{

		$uri = $this->getUri();

		$result = false;

		foreach ($this->routes as $uriPattern => $path) 
		{

            if (preg_match("~^$uriPattern$~", $uri)) 
            {


                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $params = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($params) . 'Controller');

                $actionName = 'action' . ucfirst(array_shift($params));

                $controllerObject = new $controllerName();

                call_user_func_array(array($controllerObject, $actionName), $params);

                $result = true;

                break;

            }
            
        }

        if ($result == false) 
        {
        	$controllerObject = new MainController();

        	$controllerObject -> ActionNotfound();
        }

	}


}
