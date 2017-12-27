<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 16.11.2017
 * Time: 21:00
 */

namespace controller;


use models\models_login;
use models\models_pc;
use models\models_public_function;

class controller_pc extends models_public_function
{
    protected $modelsLogin = '';
    protected $modelsPC;

    function __construct()
    {
        $this->modelsLogin = new models_login();

        if ($this->modelsLogin->ifLogin()) {
            $this->modelsPC = new models_pc();
            $typePC = $this->modelsPC->getTypePC();
            if ($_POST['addPc']) {
                $result = $this->modelsPC->addPC($_POST);
                if ($result) {

                    $this->header('pc', ['id' => $result]);
                } else {
                    $this->header('pc', ['id' => 'error']);
                }
            }

            if ($_POST['search']) {
                $foundPc = $this->modelsPC->getPC($_POST['id']);

            }
            if ($_POST['save']) {
                if ($this->modelsPC->updatePC($_POST)=='')
                    $this->header('pc', ['save' => $_POST['id']]);
                else
                    $this->header('pc', ['save' => 'error']);


            }
            $this->views($typePC, $foundPc);
        }
    }

    function views($data, $foundPc = false)
    {

        $this->includeViews('header');
        $this->includeViews('navBar');
        $this->includeViews('pcFound', $foundPc);
        $this->includeViews('pcAdd', $data);
        $this->includeViews('footer');

    }
}