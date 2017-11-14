<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 14.11.2017
 * Time: 13:12
 */

namespace models;


class models_page
{
    function logOut()
        {

            setcookie("login", 'end', time() - 3600);
            setcookie("key", 'end', time() - 3600);
            session_destroy();
//            var_dump(24324);
        }
}