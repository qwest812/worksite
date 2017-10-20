<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.08.2017
 * Time: 13:07
 */
include_once('../controllers/controller_index.php');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('HEADER','http://'.$_SERVER['SERVER_NAME'].'/404');


include(ROOT.DS.'config'.DS."config_init.php");
//$uri =$_SERVER['REQUEST_URI'];
//$router = new \config\config_router($uri);

$router =new \config\config_router($_SERVER['REQUEST_URI']);

$classUri=$router->getController();
if($classUri==null){
    $classUri='controller_index';
}
//var_dump($classUri);
$controller=new $classUri;


//var_dump($router->getController(),111);
//var_dump($router->getParams());

