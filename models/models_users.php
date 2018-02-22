<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 10.11.2017
 * Time: 0:06
 */

namespace models;


use config\config_Db;

class models_users extends models_public_function
{
    protected $db;
    protected $today;


    function __construct()
    {
        $bdConfig = new config_Db();
        $this->db = models_workWithDb::connect($bdConfig);
        $this->today= date('Y-m-d');
    }
    function  getDataUser($post)
    {
        $allUserInfo='';
        $user = $this->db->select()->setTable('user')->setWhere(['login' => $post['login']])->prepareRequestReturn();
        if($user=='')
            return false;
                else
        $allUserInfo['user']=$user[0];
        $pc=$this->db->select()->setTable('pc')->setWhere(['id'=>$allUserInfo['user']['id_pc']])->prepareRequestReturn();
        $allUserInfo['pc']=$pc[0];
        $allUserInfo['user']['officeList']=$this->db->select()->setTable('all_office')->prepareRequestReturn();
        $allUserInfo['user']['office']=$this->db->getInfoById('all_office',$allUserInfo['user']['id_office'])['office_name'];
        $allUserInfo['user']['user_last_edit']=$this->db->getInfoById('user',$allUserInfo['user']['id_user_last_edit'])['login'];
//        $dd=$this->db->getInfoById('user',$allUserInfo['user']['id_project'])['login'];
        $project=$this->db->getInfoById('user',$allUserInfo['user']['id_project']);
            $allUserInfo['user']['project']=$this->db->getInfoById('user',$allUserInfo['user']['id_project'])['login'];

//        $allUserInfo['user']['project']=$this->db->getInfoById('user',$allUserInfo['user']['id_project'])['login'];
        $allUserInfo['pc']['user_add']=$this->db->getInfoById('user',$allUserInfo['pc']['user_id_edit'])['login'];
        $allUserInfo['pc']['type_pc']=$this->db->getInfoById('type_pc',$allUserInfo['pc']['id_type_pc'])['type_pc'];

        return $allUserInfo;

    }

      function getOffice($id='')
    {
        if($id=='')
        $office = $this->db->select()->setTable('all_office')->prepareRequestReturn();
        else
            $office = $this->db->select()->setTable('all_office')->setWhere(['id'=>$id])->prepareRequestReturn();
        return $office;
    }

    function ifIssetUser($user){
           $result = $this->db->select()->setTable('user')->setWhere(['login' =>$user])->prepareRequestReturn();
           if(is_array($result))
           return true;
           else
               return false;
       }

    function addUser(array $data, array $file)
    {
//        $date = date('Y-m-d');
        $data = $this->prepareUsers($data);
        if($this->ifIssetUser($data['loginAdd'])){
            return false;
        }
        $id_user_edit = $this->db->getID('user', 'login', $_SESSION['login']);
        $id_office = $this->db->getID('all_office', 'office_name', $data['office']);
        $url_img = $this->rePlaseFile($file, $data['loginAdd']);
        $id_project=$this->db->lastIdInTabdle('user')+1;

        $sql = "INSERT INTO  `office`.`user` (
`id` ,
  `login` ,
    `pass` ,
      `id_office` ,
        `id_pc` ,
          `id_project` ,
            `phone` ,
              `birthday` ,
                `dataReg` ,
                  `id_user_last_edit` ,
                    `data_last_edit` ,
                      `id_access` ,
                        `img_url` ,
                          `url_kee_pass_bd` ,
                            `url_kee_pass_key` ,
                              `key_time`
)
VALUES (
'' ,
  '" . $data['loginAdd'] . "',
    '',
      '" . $id_office . "',
        '" . $data['id_pc'] . "',
          '".$id_project."',
            '" . $data['phone'] . "',
              '" . $data['birthday'] . "',
                '" . $this->today . "',
                  '" . $id_user_edit . "',
                    '" . $this->today . "',
                    '',
                      '" . $url_img . "',
                        '" . $data['urlKB'] . "',
                          '" . $data['urlKK'] . "',
                            ''
);";
        $result = $this->db->prepareRequestReturn($sql);
//        var_dump($result);
            if ($result==='') {
                $_SESSION['loginAdd'] = $data['loginAdd'];

                return true;
            }

        else
            return false;

    }

    protected function rePlaseFile($file, $login)
    {
        $login .= ".jpg";
        $path = '../webroot/tmp/' . $login;
        $data = $this->today;
        $name = $login . ':' . $data;
        if (!@copy($_FILES['picture']['tmp_name'], $path))
            return false;
        else
            return $path;
    }

    protected function prepareUsers($data)
    {
        $data['loginAdd'] = $this->cleanString($data['loginAdd']);
        $data['phone'] = $this->cleanString($data['phone']);
        $data['urlKB'] = $this->cleanString($data['urlKB']);
        $data['urlKK'] = $this->cleanString($data['urlKK']);
        $data['birthday'] = $this->cleanString($data['birthday']);
        $data['office'] = $this->cleanString($data['office']);
        return $data;
    }
    function updateUser(array $data){
        if(!empty($data['login'] && !empty($data['numberPc']))){
            $data=$this->cleanArray($data);
            $pass=$this->hashPass($data['pass'],$data['login']);
            $id_office = $this->db->getID('all_office', 'office_name', $data['office']);
            $id_user_edit = $this->db->getID('user', 'login', $_SESSION['login']);
            $id_project = $this->db->getID('user', 'login', $data['project']);

//            var_dump($data);
            $sql="UPDATE `user` SET
    `login`='" . $data['login'] . "',
      `pass`='".$pass."',
         `id_office`='".$id_office."',
            `id_pc`='" . $data['numberPc'] . "',
                `id_project`='".$id_project."',
                  `phone`='".$data['phone']."',
                    `birthday`='".$data['birthday']."',
                          `id_user_last_edit`='".$id_user_edit."',
                            `data_last_edit`='" . $this->today . "',
                              `id_access`='".$data['access']."',
                                    `url_kee_pass_bd`='".$data['keepassBD']."',
                                        `url_kee_pass_key`='".$data['keepassKey']."',
                                        `key_time`='".''."'

WHERE `login`='" . $data['login'] . "'";
        $result=$this->db->prepareRequestReturn($sql);
//            var_dump($result);
        }
    }
    protected function hashPass($pass,$user){
        $userPass=$this->db->select()->setWhatSelect(['pass'])->setWhere(['login'=>$user])->setTable('user')->prepareRequestReturn()[0]['pass'];
        if(empty($pass))
            return $userPass;
        return md5($pass);
    }


}