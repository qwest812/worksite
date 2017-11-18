<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 16.11.2017
 * Time: 21:00
 */

namespace controller;


use models\models_login;
use models\models_public_function;

class controller_pc extends models_public_function
{
    protected $modelsLogin='';
    function __construct(){
        $this->modelsLogin=new models_login();
        if($this->modelsLogin->ifLogin()){
            $this->views();
        }else{
            $this->header('index',['actions'=>'noLogin']);
        }

    }
    function views(){
        $this->includeViews('header');
        $this->includeViews('navBar');
        $this->includeViews('pc');
        $this->includeViews('footer');

    }
}