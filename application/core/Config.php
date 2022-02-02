<?php

namespace application\core;

class Config
{
	// 'route/(pattern)' => 'controller/action/param1/param2/...'
	// 'news/([0-9]+)' => 'news/view/$1',
	public static $routes = array(
		'posts' => 'posts/index',
		'post/([0-9]+)' => 'posts/single/$1'
	);

	public static $db = [
		'host' => 'localhost',
		'name' => 'test2',
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