<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 06.01.2018
 * Time: 23:13
 */

namespace models;

use config\config_Db;
class models_equipment
{

    function __construct(){
        $bdConfig = new config_Db();
        $this->db= models_workWithDb::connect($bdConfig);
    }
    function getAllSOffice()
    {
        $result = $this->db->select()->setWhatSelect(['office_name'])->setTable('all_office')->prepareRequestReturn();
        return $result;
    }

}
