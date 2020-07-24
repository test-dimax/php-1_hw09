<?php


namespace App\Models;

use \App\DB;

class Text
{

    //Вводим защищеное св-во $db для подключение к базе данных
    protected $db;

    public function __construct()
    {
        //подключаемся к базе
        $this->db = new DB();
    }

    //метод который будет получать запись из базы данных
    public function getText()
    {
        $sql = 'SELECT `main_text` FROM `text`';
        $text = $this->db->query($sql);
        return $text[0]['main_text'];
    }

    //метод который будет редактировать запись
    public function updateText($data)
    {
        $data = "'".$data."'";
        $sql = 'UPDATE `text` SET `main_text`='.$data;
        $this->db->query($sql);
    }

}