<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 18.11.2017
 * Time: 23:04
 */

namespace models;


use config\config_Db;

class models_pc extends models_public_function
{
    protected $db;
    protected $today;

    function __construct()
    {
        $bdConfig = new config_Db();
        $this->db = models_workWithDb::connect($bdConfig);
        $this->db->lastIdInTabdle('pc');
        $this->today = date('Y-m-d');
    }

    function addPC(array $data)
    {
//        var_dump($data);


        $id = $this->db->getID('user', 'login', $_SESSION['login']);
        $idTypePC = $this->db->getID('type_pc', 'type_pc', $data['typePC']);

        if (!empty($data['passPc']) && !empty($data['firstPass']) && !empty($data['secondPass']) && !empty($data['thirdPass'])) {
            $sql = "INSERT INTO  `pc`
(  `id` , `id_type_pc`,  `pass_pc` ,  `pass_first` ,  `pass_second` ,  `pass_third` ,  `pc_data_last_edit` ,  `user_id_edit` )
                        VALUES (
                        '',
                          '" . $idTypePC . "',
                            '" . $data['passPc'] . "',
                                '" . $data['firstPass'] . "',
                                    '" . $data['secondPass'] . "',
                                        '" . $data['thirdPass'] . "',
                                            '" . $this->today . "',
                                                '" . $id . "'
                        )";
            $result = $this->db->prepareRequestReturn($sql);
            if ($result === '') {
                return $this->db->lastId();
            }
            return false;
        }
    }


    function getPC($id)
    {
        if ($id > 0) {
            $sql = "SELECT  `pc`.`id`,`pass_pc` ,
  `pass_first` ,
    `pass_second` ,
      `pass_third` ,
        `pc_data_last_edit` ,
          `login` ,
            `type_pc`,
              `pc_note`
            FROM  `pc` ,  `user` ,  `type_pc`
            WHERE  `pc`.`user_id_edit` =  `user`.`id`
            AND  `pc`.`id` =  '" . $id . "'
            AND  `type_pc`.`id` =  `pc`.`id_type_pc`
            LIMIT 1";
            $result = $this->db->prepareRequestReturn($sql);
            return $result ? $result : false;

        }
    }

    function getTypePC()
    {
        $result = $this->db->select()->setTable('type_pc')->prepareRequestReturn();
        return $result;
    }

    function updatePC($post)
    {
        if (!empty($post['pass_pc']) && !empty($post['pass_first']) && !empty($post['pass_second']) && !empty($post['pass_third'])) {
            $id_pc = $post['id'];
            $pass_pc = $this->cleanString($post['pass_pc']);
            $pass_first = $this->cleanString($post['pass_first']);
            $pass_second = $this->cleanString($post['pass_second']);
            $pass_third = $this->cleanString($post['pass_third']);
            $pc_note=$this->cleanString($post['pc_note']);
            $idUserLastEdit = $this->db->getID('user', 'login', $_SESSION['login']);

            $sql = "UPDATE `pc`
                      SET
                          `pass_pc`='" . $pass_pc . "',
                            `pass_first`='" . $pass_first . "',
                              `pass_second`='" . $pass_second . "',
                                `pass_third`='" . $pass_third . "',
                                    `pc_note`='" . $pc_note . "',
                                        `pc_data_last_edit`='" . $this->today . "',
                                          `user_id_edit`=" . $idUserLastEdit . "
                      WHERE `id`='" . $id_pc . "'";
            if ($this->db->prepareRequestReturn($sql))
                return $id_pc;
            else
                return false;


        } else {
            return false;
        }


        return true;
    }
}