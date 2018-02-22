<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 06.01.2018
 * Time: 23:10
 */

namespace controller;


use models\models_equipment;
use models\models_login;
use models\models_public_function;

class controller_equipment extends models_public_function
{
    protected  $modelLogin;
    protected  $models_equipment;
    function __construct(){
        $this->models_equipment= new models_equipment();
        $this->modelLogin= new models_login();
        if($this->modelLogin->ifLogin()){
            $allOffice=$this->models_equipment->getAllSOffice();
                    $this->views($allOffice);
                }
    }

    function views($office){
        $this->includeViews('header');
                $this->includeViews('navBar');
                $this->includeViews('equipmentAdd',$office);
                $this->includeViews('footer');
    }

}