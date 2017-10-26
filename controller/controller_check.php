<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 11.10.2017
 * Time: 11:53
 */

namespace controller;


class controller_check
{
function __construct(){

}
    function passCash($pass){
        return md5(trim(htmlspecialchars("kdfps".$pass."fgudxsg")));

    }
}