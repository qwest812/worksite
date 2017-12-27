<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.11.2017
 * Time: 0:05
 */

namespace controller;


use models\models_login;
use models\models_public_function;
use models\models_users;

class controller_users extends models_public_function
{
    protected $modelsLogin;
    protected $modelsUser;

    function __construct()
    {

        $this->modelsLogin = new models_login();

        if ($this->modelsLogin->ifLogin()) {
            $this->modelsUser=new models_users();
            if ($_POST['search']) {

                $user=$this->modelsUser->getDataUser($_POST);
//                var_dump($user);
            }

            if($_POST['addUser']){
                        $result=$this->modelsUser->addUser($_POST,$_FILES);
                if($result)
                    $this->header('users',['add'=>'good']);
                else
                    $this->header('users',['add'=>'error']);
                    }
          $office=$this->modelsUser->getOffice();
            $this->views($office,$user);
        }
    }
    function views($office,$user)
    {

        $this->includeViews('header');
        $this->includeViews('navBar');
        $this->includeViews('usersFound',$user);
        $this->includeViews('usersAdd',$office);
        $this->includeViews('footer');

    }
}