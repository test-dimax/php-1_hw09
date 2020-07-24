<?php


namespace App\Models;

use App\DB;


class User
{
    //Вводим защищеное св-во $db для подключение к базе данных
    protected $db;

    public function __construct()
    {
        //подключаемся к базе
        $this->db = new DB();
    }

    //проверяем - существует ли пользователь с заданным логином (проходим идентификацию)
    function existsUser($login) {
        //проверяем существует ли переменная $login и не пуста ли она
        if (isset($login) && !empty($login) ) {
            $sql = 'SELECT true FROM `users` WHERE `name`="'.$login.'"';
            $result = $this->db->query($sql);
            return $result;
        }
    }

    // проверяем существует ли пользователь с указанным логином и введенный им паролем (проходим аутентификацию)
    function checkPassword($login, $password) {
        if (isset($password) && !empty($password) ) {
            $sql = 'SELECT `password` FROM `users` WHERE `name`="'.$login.'"';
            $user_password = $this->db->query($sql);
            if ($user_password) {
                $user_password = $user_password[0]['password'];
                if (password_verify( $password, $user_password )) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

}