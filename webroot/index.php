<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.08.2017
 * Time: 13:07
 */
session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('HEADER','http://'.$_SERVER['SERVER_NAME'].'/404');


include(ROOT.DS.'config'.DS."config_init.php");

$router =new \config\config_router($_SERVER['REQUEST_URI']);

$classUri=$router->getController();
$controller=new $classUri();


//var_dump($router->getController(),111);
//var_dump($router->getParams());

