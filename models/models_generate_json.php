<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 26.10.2017
 * Time: 15:24
 */

namespace models;


use config\config_Db;

class models_generate_json extends models_public_function
{
    public $bd;

    function  __construct()
    {
        $bdConfig = new config_Db('localhost', 'office', 'root', '');
        $this->bd = models_workWithDb::connect($bdConfig);
    }

    function autocomplete($table,$data)
    {
        $like=$this->cleanString($_GET['q']);
        $sql= "SELECT `$data` FROM `$table` WHERE `$data` LIKE '$like%'";
        var_dump($sql);
        $generator= $this->bd->prepareRequestReturn($sql);
        if($generator==''){
            echo 'Данных нет';
        }else{
            foreach($generator as $value){
                        echo $value[$data] . "\n";
                    }
        }
    }
    function checkKey($params){
        parse_str($params);
        $params=stristr($params, '&key=',true);
        $result= md5('sprite'.$params.'dauzer');
        return false;

       }
    function getRequest(){
        switch ($_GET['request']){
            case 'login': $this->autocomplete('user','login');
                break;
            case 'id': $this->autocomplete('user','id');
                            break;
            case 'office':$this->autocomplete('all_office','office_name');
                break;
        }
    }

}