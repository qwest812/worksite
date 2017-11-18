<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 11.10.2017
 * Time: 11:21
 */

namespace controller;


use models\models_generate_json;
use models\models_login;
use models\models_public_function;


class controller_generate_json extends models_public_function
{

    function __construct()
    {
        $modelLogin = new models_login();
        if ($modelLogin->ifLogin()) {
            $model_generate = new models_generate_json();

//            $model_generate->autocomplete('user', 'login');
            $model_generate->getRequest();
        }else{
            $this->header('index',array('actions'=>'noLogin'));
        }

    }


}