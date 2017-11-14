<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 07.11.2017
 * Time: 21:04
 */

namespace models;


class models_public_function
{
    protected $actions = [
        'login' => 'Введенный пароль или логин неверный',
        'noLogin' => 'Вы не вошли в ситему',
        'exit' => 'Спасибо что были с нами',
    ];

    /**
     * for crypt pass
     * @param $string
     * @return string
     */
    function ctyptPass($string)
    {
        return trim(md5('123' . $string . 'key'));
    }

    /**
     * for generate crypt key
     * @param int $lenght
     * @return string
     */
    function genarate_key($lenght = 10)
    {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $lenght; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return md5($string);
    }

    function actions($key)
    {
        return $this->actions[$key];
    }

    function header($page, array $param = [])
    {
        if (!empty($param)) {
            $string = '';
            foreach ($param as $key => $value) {
                $string .= $key . '=' . $value . '&';
            }
            $string = substr($string, 0, -1);

//                var_dump($page);
//                var_dump($string);
            header('Location:' . "http://worksite/" . $page . "?" . $string);
        } else {
            header('Location:' . "http://worksite/" . $page);
        }

    }

}