<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 11.10.2017
 * Time: 11:21
 */

namespace controller;


use config\config_router;
use models\models_generate_json;


class controller_generate_JSON
{

 function __construct(){
     $modelGenJson=new models_generate_json();
     $config= new config_router();
     $result=$modelGenJson->checkKey($config->getParams());
     if($result){
         echo 'ggg';
     }else{
         echo 'fff';
     }



 }


}