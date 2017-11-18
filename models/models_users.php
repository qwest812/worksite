<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.11.2017
 * Time: 0:06
 */

namespace models;


use config\config_Db;

class models_users
{
    protected $db;

    function __construct()
    {
        $bdConfig = new config_Db();
        $this->db = models_workWithDb::connect($bdConfig);
    }


    function  getDataUser($post)
    {
        if (($post['id']!='')) {
            $result = $this->db->select()->setWhere(['id' => $post['id']])->prepareRequestReturn();
//            var_dump($result);
        }
    }
}