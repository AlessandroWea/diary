<?php

define("ROOT_DIR_NAME",@end(explode('/', __DIR__)));
define('ROOT', dirname(__FILE__));
define("SERVER_PATH", "http://localhost/diary/");

require 'application/lib/Dev.php';

use application\core\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\','/', $class.'.php');
    if(file_exists($path)){
    	require $path;
    }
});

session_start();

$router = new Router;
$router->run();

