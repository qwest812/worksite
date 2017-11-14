<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 26.10.2017
 * Time: 15:24
 */

namespace models;


use config\config_Db;

class models_generate_json
{
    public $bd;

    function  __construct()
    {
        $bdConfig = new config_Db('localhost', 'office', 'root', '');
        $this->bd = models_workWithDb::connect($bdConfig);
    }

    function generateToJSON($generator)
    {
        $generator= $this->bd->select()->setWhatSelect()->setTable('user')->prepareRequest();
        $json = [];
        foreach ($generator as $value) {
            $json[] = $value;
        }
        $obj =json_encode($json);
        return $obj;
    }
    function checkKey($params){
        parse_str($params);
        $params=stristr($params, '&key=',true);
        $result= md5('sprite'.$params.'dauzer');
        return false;

       }
    function login($login,$pass){

       }

}