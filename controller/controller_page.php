<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 09.11.2017
 * Time: 16:44
 */

namespace controller;


use models\models_page;
use models\models_public_function;

class controller_page extends models_public_function
{
    protected $model;
 function __construct(){
//     var_dump($_SESSION);
//     var_dump($_POST);
$this->model=new models_page();
     if($_POST['exit']){

                 $this->model->logOut();
                 $this->header('index', array('actions'=>'exit'));
             }
     $this->view();
 }
    function view(){
        include_once('../views/header.php');
                    include_once('../views/moduls/navBar.php');
                include_once('../views/footer.php');
    }
}