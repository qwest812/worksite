<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 03.10.2017
 * Time: 18:21
 */

namespace controllers;


use config\config_router;

class controller_404
{
  function __construct(){

      include_once($_SERVER['DOCUMENT_ROOT'].DS.'views'.DS.'404.html/');
  }
}