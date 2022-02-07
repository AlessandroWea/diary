<?php

namespace application\core;

class Config
{
	// 'route/(pattern)' => 'controller/action/param1/param2/...'
	// 'news/([0-9]+)' => 'news/view/$1',
	public static $routes = array(
		//IndexController
		'' => 'index/main',
		//AccountController
		'login' => 'account/login',
		'signup' => 'account/signup',
		'logout' => 'account/logout',
		//WritingController
		'write' => 'writing/write',
		'view/([0-9]+)' => 'writing/view/$1',

	);

	public static $db = [
		'host' => 'localhost',
		'name' => 'diary',
		'user' => 'root',
		'password' => ''
	];

	public static function getRoutes()
	{
		return self::$routes;
	}

	// public static function getDBdata()
	// {
	// 	return self::$db;
	// }
}