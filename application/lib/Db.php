<?php

namespace application\lib;

use application\core\Config;

use PDO;

class Db {

    private function __construct() {}
    private function __clone() {}
	
	public static function execute($sql, $params = [])
	{
		$config = Config::$db;
		$db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'], $config['user'],$config['password']);

		$query = $db->prepare($sql);
		$query->execute($params);
		$errInfo = $query->errorInfo();
		if($errInfo[0] !== PDO::ERR_NONE)
		{
			echo $errInfo[2];
			exit();
		}

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function execute_v2($sql, $params = [])
	{
		$config = Config::$db;
		$db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'], $config['user'],$config['password']);

		$query = $db->prepare($sql);
		$query->execute($params);
		$errInfo = $query->errorInfo();
		if($errInfo[0] !== PDO::ERR_NONE)
		{
			echo $errInfo[2];
			exit();
		}

		return $query;
	}

	public static function execute_v3($sql, $params = [])
	{
		$config = Config::$db;

		$db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'], $config['user'],$config['password']);
		// $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );



		$query = $db->prepare($sql);
		foreach ($params as $key => $value) {
			if(is_numeric($value))
			{
				@$query->bindParam($key, intval($value), PDO::PARAM_INT);
			}
			else
			{
				$query->bindParam($key, $value, PDO::PARAM_STR);
			}
		}
		$query->execute();

		$errInfo = $query->errorInfo();
		if($errInfo[0] !== PDO::ERR_NONE)
		{
			echo $errInfo[2];
			exit();
		}

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

}