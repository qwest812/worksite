<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 02.11.2017
 * Time: 18:07
 */

namespace models;


use config\config_Db;

class models_login extends models_public_function
{
    public $db;

    function __construct()
    {
        $bdConfig = new config_Db('localhost', 'office', 'root', '');
        $this->db = models_workWithDb::connect($bdConfig);
        $ff = models_workWithDb::connect($bdConfig);
    }

    /**
     * if isset cookie
     * and if it is same in base
     * @return bool
     */
    function ifIssetCookie()
    {
        $login = $_COOKIE['login'];
        $key = $_COOKIE['key'];
        $array = ['login' => $login];
        $generator = $this->db->select()->setWhatSelect(array('login', 'key_time'))->setTable('user')->setWhere($array)->prepareRequest();

        foreach ($generator as $value) {
            if ($generator == false) {
                return false;
            }
            if ($value['key'] != $key) {

                return false;
            }
        }
        return true;
    }

    function ifIssetUser(array $post)
    {
        if (!empty($post['login']) && !empty($post['pass'])) {
            $login = trim($post['login']);
            $pass = trim(md5($post['pass']));
            $result = $this->ifTruUserAndKey($login, $pass);
            if ($result) {
                return true;
            }
        }
        return false;
    }

    function ifTruUserAndKey($login, $pass)
    {
        if (empty($login) || empty($pass)) {
            return false;
        }
        $array = ['login' => $login];
        $generator = $this->db->select()->setWhatSelect(array('login', 'pass'))->setTable('user')->setWhere($array)->prepareRequest();

        foreach ($generator as $value) {
            if ($generator == false) {
                return false;
            }
            if ($value['pass'] != $pass) {
                return false;
            }
        }

        return true;
    }

    function setSession(array $post)
    {
        $login = $post['login'];
        if ($login) {
            $_SESSION['login'] = $login;
            $key = $this->genarate_key();
            $sql = "UPDATE `user` SET `key_time`='$key' WHERE `login`= '$login'";
            $generator = $this->db->prepareRequest($sql);
            foreach ($generator as $value) {
                if ($generator == false) {
                    return false;
                }
            }
            $_SESSION['key'] = $key;
            return true;
        }

    }

    function setCookie($post)
    {
        setcookie("login", $post['login'], time() + 3600);
        setcookie("key", $post['key'], time() + 3600);
    }
    function ifLogin(){
            if($this->ifIssetCookie()){
                $login=$_COOKIE['login'];
                $key=$_COOKIE['key'];
                if($this->setSession(array('login'=>$login,'key'=>$key))){
                    return true;
                }
            }
            return false;

        }



}