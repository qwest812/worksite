<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 11.10.2017
 * Time: 11:21
 */

namespace controller;

use config\config_Db;
use models\models_workWithDb;

class controller_generate_JSON
{

 function __construct(){
     $bdConfig = new config_Db('localhost','office','root', '');
     $bd= models_workWithDb::connect($bdConfig);
     $result= $bd->select()->setTable('usser')->prepareRequest();
     $obj =json_encode($result);
     echo __CLASS__;
     echo $obj;

 }
}