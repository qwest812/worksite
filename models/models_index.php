<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 26.10.2017
 * Time: 15:23
 */

namespace models;

use config\config_Db;

class models_index
{
    public $db;

    function __construct()
    {
        $bdConfig = new config_Db('localhost', 'office', 'root', '');
        $this->db = models_workWithDb::connect($bdConfig);

    }

    function allOffice()
    {
        $generator = $this->db->select()->setWhatSelect()->setTable('all_office')->prepareRequest();
        foreach ($generator as $value) {
//            var_dump($value);
        }
    }

}
