<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 09.11.2017
 * Time: 16:44
 */

namespace controller;


use models\models_login;
use models\models_page;
use models\models_public_function;

class controller_page extends models_public_function
{
    protected $model;
    protected $modelLogin;
 function __construct(){
$this->model=new models_page();
     if($_POST['exit']){
                 $this->model->logOut();
                 $this->header('index', array('actions'=>'exit'));
             }
     $this->modelLogin=new models_login();
     if($this->modelLogin->ifLogin()){
         $this->view();
     }


 }
    function view(){
        $this->includeViews('header');
        $this->includeViews('navBar');
        $this->includeViews('footer');
//        include_once('../views/header.php');
//                    include_once('../views/moduls/navBar.php');
//                include_once('../views/footer.php');
    }
}