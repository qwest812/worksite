<?php
namespace config;
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.08.2017
 * Time: 13:21
 */
class config_Config
{

    //массив настроек
    protected static $settings = array();
    //путей к классам
    protected static $mapClass = array();
//получение ключа
    public static function get($key)
    {
        return (self::$settings[$key]) ? self::$settings[$key] : null;
    }

    public static function set($key, $value)
    {
        self::$settings[$key] = $value;
    }



// регистрация класса
    public function registerClass($class, $dir)
    {
        if (file_exists($dir)) {
            self::$mapClass[$class] = $dir;
            return true;
        }
        return false;
    }

    public function autoload($className)

    {
        if (!empty(self::$mapClass[$className])) {
            require_once self::$mapClass[$className] . $className . ".php";
        } else {

            $path = ROOT . DS . (str_replace('\\', DS, $className)) . ".php";
            if (file_exists($path)) {
                $this->registerClass($className, $path);
                include_once($path);
            } else {

//                var_dump('http://'.$_SERVER['SERVER_NAME'].'/404');
//                var_dump(2);
                header('Location:'.HEADER);

            }

        }
    }
    static function clear($string){

        $result= trim(strip_tags($string));
        return $result;
    }

}

?>
