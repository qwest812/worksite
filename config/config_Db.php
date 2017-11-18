<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 04.10.2017
 * Time: 13:25
 */

namespace config;


class config_Db
{

    public $host;
    public $db;
    public  $user;
    public $pass;
    public $charset;

    /**
     * @param $host
     * @param $db
     * @param $user
     * @param $pass
     * @param string $charset
     */
//$bdConfig = new config_Db('localhost', 'office', 'root', '');
    function __construct($host='localhost',$db='office',$user='root',$pass='',$charset='utf8'){

        $this->host=$host;
        $this->db=$db;
        $this->user=$user;
        $this->pass=$pass;
        $this->charset=$charset;

    }

}