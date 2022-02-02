<?php

namespace application\core;

class View {

	public $path;
	public $layout = 'default';
	public $views_folder = 'application/views/';
	public $layout_folder = 'application/views/layouts/';
	static public $ext = '.view.php';

	public function __construct($controllerName, $actionName)
	{
		$this->path = $controllerName .'/'. $actionName;
	}

	public function render($title, $vars = [])
	{
		if($vars)
			extract($vars);

		if(file_exists($this->views_folder . $this->path . self::$ext))
		{
			ob_start();
			require $this->views_folder . $this->path . self::$ext;
			$content = ob_get_clean();
			require $this->layout_folder . $this->layout . '.php';
		}
		else
		{
			echo "NOT FOUND!";
		}

	}

	public static function errorCode($code)
	{
		http_response_code($code);
		require 'application/views/errors/'.$code.self::$ext;		
		exit();
	}

	public function redirect($url)
	{
		header('Location: '.$url);
		exit();
	}
}