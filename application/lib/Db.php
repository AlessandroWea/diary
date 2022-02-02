<?php

namespace application\lib;

use application\core\Config;

use PDO;

class Db {

    private function __construct() {}
    private function __clone() {}
	//select * from users where id=:id and name=:name;
	//params['id'=>2, 'name'=>'Ale']
	
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
}