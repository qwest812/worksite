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
            //var_dump($value);
            if ($value == false) {
                return false;
            }
            //var_dump($key);
            //var_dump($value['key_time']);
            if ($value['key_time'] != $key) {

                return false;
            }
        }
        return true;
    }

    function ifIssetUser(array $post)
    {
        if (!empty($post['login']) && !empty($post['pass'])) {
            $login = $this->cleanString($post['login']);
            $pass = $this->cleanString(md5($post['pass']));
            $result = $this->ifTruUserAndPass($login, $pass);
            if ($result) {
                return true;
            }
        }

        return false;
    }

    function ifTruUserAndPass($login, $pass)
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
    function ifTruUserAndKey($login, $key)
        {
            if (empty($login) || empty($key)) {
                return false;
            }
            $array = ['login' => $login];
            $generator = $this->db->select()->setWhatSelect(array('login', 'key_time'))->setTable('user')->setWhere($array)->prepareRequest();

            foreach ($generator as $value) {
                if ($generator == false) {
                    return false;
                }
                if ($value['key_time'] != $key) {
                    return false;
                }
            }

            return true;
        }

    function setSession(array $post)
    {
        $login = $post['login'];
        if ($login) {
            $key = $this->genarate_key();
            $_SESSION['login'] = $login;
            $_SESSION['key'] = $key;
            $sql = "UPDATE `user` SET `key_time`='$key' WHERE `login`= '$login'";
            $generator = $this->db->prepareRequest($sql);
            foreach ($generator as $value) {
                if ($generator == false) {
                    return false;
                }
            }

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
                $_SESSION['key']=$key;
                $_SESSION['login']=$login;
                return true;
            }
        if($this->ifIssetSession()){
            return true;
        }

            return false;

        }
    function ifIssetSession(){
        $login = $_SESSION['login'];
               $key = $_SESSION['key'];
               $array = ['login' => $login];
               $generator = $this->db->select()->setWhatSelect(array('login', 'key_time'))->setTable('user')->setWhere($array)->prepareRequest();

               foreach ($generator as $value) {
                   if ($value == false) {
                       return false;
                   }
                   if ($value['key_time'] != $key) {

                       return false;
                   }
               }
               return true;
    }



}