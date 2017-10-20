<?php
namespace config;
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.08.2017
 * Time: 16:22
 */
//подключаем  конфиг
include_once(ROOT.DS.'config'.DS."config_Config.php");
$config =new config_Config();
// подключаем класс и функцичю для автозагрузки классов
spl_autoload_register([$config,'autoload']);

