<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.08.2017
 * Time: 16:43
 */



namespace controller;
use config\config_Db;
use models\models_workWithDb;

class controller_index
{
    function __construct(){
        $bdConfig=new config_Db('localhost','office','root','');

        $bd= models_workWithDb::connect($bdConfig);

        $generator=$bd->select()->setWhatSelect()->setTable('all_office')->prepareRequest();
        include_once('../views/header.php');
            include_once('../views/login.php');
        include_once('../views/footer.php');

    }
}