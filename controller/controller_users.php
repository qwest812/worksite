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
            if ($_POST['search']) {
                $this->modelsUser=new models_users();
                $this->modelsUser->getDataUser($_POST);
            }
            $this->views();

        } else {
            $this->header('index', array('actions' => 'noLogin'));
        }
    }


    function views()
    {

        $this->includeViews('header');
        $this->includeViews('navBar');
        $this->includeViews('users');
        $this->includeViews('footer');

//        include_once('../views/header.php');
//        include_once('../views/moduls/navBar.php');
//        include_once('../views/moduls/users.php');
//        include_once('../views/footer.php');

    }
}