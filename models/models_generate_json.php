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
        $q=["value"=>"Some Name","id"=>1,"value2"=>"Some Othername","id2"=>2];
//        echo json_encode(array_keys($_GET));
//        echo json_encode($_GET);
        $bdConfig = new config_Db('localhost', 'office', 'root', '');
        $this->bd = models_workWithDb::connect($bdConfig);
    }

    function autocomplete($table,$data)
    {
//        echo json_encode($_GET);
        $like=$this->cleanString($_GET['term']);
//        echo json_encode([$like]);
        $sql= "SELECT `$data` FROM `$table` WHERE `$data` LIKE '$like%'";
//        var_dump($sql);
        $generator= $this->bd->prepareRequestReturn($sql);
        if($generator==''){
            echo json_encode(['Данных нет']);
//            echo 'Данных нет';
        }else {
            foreach ($generator as $value) {
//                echo $value[$data] . "\n";
                echo json_encode($value);
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
            case 'id': $this->autocomplete('pc','id');
                            break;
            case 'office':$this->autocomplete('all_office','office_name');
                break;
        }
    }

}