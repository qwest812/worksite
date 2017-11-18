<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 11.10.2017
 * Time: 11:53
 */

namespace controller;


use models\models_login;
use models\models_public_function;

class controller_login extends models_public_function
{
    protected $model;
    function __construct()
    {
       $this->model=new models_login();



        if($this->model->ifLogin()){

            $this->header('page');
        }
        if(!empty($_POST['login']) && !empty($_POST['pass'])){

            if($this->login($_POST)){
                        $this->header('page');
                    }else{
                        $this->header('index',array('actions'=>'login'));
                    }
        }else{
            $this->header('index');
        }



    }

    function login($post)
    {

        if ($this->model->ifIssetUser($post)) {


            $this->model->setSession($post);
            if ($post['save']=='on') {
                        $this->model->setCookie($post);

                    }
            return true;

        }else{
            return false;

        }

    }


}