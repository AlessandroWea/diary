<?php 

namespace application\core;
use application\core\Config;

class Router 
{
	private $routes;

	public function __construct()
	{
		$this->routes = Config::getRoutes();
	}

	private function getURI()
	{
		$url = trim($_SERVER['REQUEST_URI'],'/');
		
		// if(strpos($url, '?') === strlen($url)-1)
		// {
		// 	$url = substr_replace($url,"",strlen($url)-1, 1);
		// }
		$url = trim(str_replace(ROOT_DIR_NAME, '', $url),'/');

		return $url;
	}

	public function run()
	{
		$uri = $this->getURI();
		$result = null;

		foreach($this->routes as $uriPattern => $path){
			if(preg_match("#^$uriPattern$#", $uri)){

				$internalRoute = preg_replace("#^$uriPattern$#", $path, $uri);

				$segments = explode('/',$internalRoute);
				//for the constructor of a controller
				$controllerClassName = $segments[0];
				$controllerActionName = $segments[1];
			
				$controllerName = array_shift($segments) . 'Controller';
				$controllerName = ucfirst($controllerName);

				$actionName = 'action' . ucfirst(array_shift($segments));

				$parameters = $segments;
				$controllerFile = ROOT . '/application/controllers/' . $controllerName . '.php';
				if(file_exists($controllerFile)){
					include_once($controllerFile);
				}

				$controllerName = 'application\controllers\\'.$controllerName;

				$controllerObject = new $controllerName($controllerClassName, $controllerActionName);

				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				if($result != null){
					break;
				}
			}
		}
		if(!$result)
			View::errorCode(404);
	}

}
