<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 27.09.2017
 * Time: 17:22
 */

namespace controller;


use models\models_login;
use models\models_office;
use models\models_public_function;

class controller_office extends models_public_function
{
    protected  $modellogin;
    protected $modelOffice;
    function __construct(){
        $this->modellogin=new models_login();
        $this->modelOffice=new models_office();
        if($this->modellogin->ifLogin()){
            $allOffice=$this->modelOffice->getAllSOffice();
            $allUserbyOffice=$this->getUserByOffice($_GET['office']);

            $this->views($allOffice,$allUserbyOffice);
        }
    }
    function views($office,$users){
        $this->includeViews('header');
                $this->includeViews('navBar');
                $this->includeViews('office',['office'=>$office,'users'=>$users]);
                $this->includeViews('footer');
    }
    function getUserByOffice($office){
        if($office!=''){
           $users=$this->modelOffice->getAllUserFromOffice($office);
            if($users==''){
                return false;
            }
            return $users;
        }else{
            return false;
        }
    }
}