<?php

namespace application\core;
use application\core\View;

//actions a called action{Name}
//variables a passed like this:
//$vars = [
	// 'name_in_view' => $var_in_controller,
	// 'next_name_in_view' => $array_of_data,
// ]
//$this->view->render("Name", $vars);

abstract class Controller {

	public $view;
	// public $model;

	public function __construct($controllerName, $actionName)
	{
		$this->view = new View($controllerName, $actionName);
		// $this->model = $this->loadModel($route['controller']);
	}

	// public function loadModel($name){
	// 	$path = 'application\models\\'.ucfirst($name);
	// 	if(class_exists($path)){
	// 		return new $path;
	// 	}
	// }
}