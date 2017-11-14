<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.08.2017
 * Time: 16:43
 */



namespace controller;
use models\models_index;
use models\models_login;
use models\models_public_function;


class controller_index extends models_public_function
{
    function __construct(){
        $modelsLogin=new models_login();
        $modelIndex= new models_index();

        $modelIndex->allOffice();
//        var_dump($_COOKIE);
        if($modelsLogin->ifLogin()){
            $this->header('page');
        }
        if($_GET['actions']){
            $actions=$this->actions($_GET['actions']);
        }
        include_once('../views/header.php');
            include_once('../views/login.php');
        include_once('../views/footer.php');

    }
}