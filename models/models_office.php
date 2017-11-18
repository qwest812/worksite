<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 27.09.2017
 * Time: 17:26
 */

namespace models;

use config\config_Db;
class models_office
{
    function __construct(){
            $bdConfig = new config_Db();
                $this->db = models_workWithDb::connect($bdConfig);

    }
    function getAllSOffice(){
        $result = $this->db->select()->setWhatSelect(['office_name'])->setTable('all_office')->prepareRequestReturn();
        return $result;
    }
    function getAllUserFromOffice($office){
        //$sql="SELECT `login`, FROM `all_office`, `user` WHERE  `all_office`.`office_name`= 'Осло' ";
        $sql="SELECT `login` FROM `all_office`, `user` WHERE  `all_office`.`office_name`= '".$office."' AND `all_office`.`id`= `user`.`id_office`";
        $result = $this->db->prepareRequestReturn($sql);
                return $result;
    }
}