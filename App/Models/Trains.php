<?php


namespace App\Models;

use App\DB;

class Trains
{
    //Вводим защищеное св-во $db для подключение к базе данных
    protected $db;

    public function __construct()
    {
        //подключаемся к базе
        $this->db = new DB();
    }

    //метод который будет получать записи из базы данных
    public function getTrains(int $id = null)
    {
        if ($id) {
            //если передан id записи, то берем из базы только запись с заданным id
            $sql = 'SELECT * FROM `trains` WHERE `id`='.$id;
        } else {
            //иначе берем все записи
            $sql = 'SELECT * FROM `trains`';
        }
        $trains = $this->db->query($sql);
        $prepare_trains = [];
        if (!empty($trains)){
            foreach ($trains as $train) {
                $all_time = strtotime($train['finish']) - strtotime($train['start']);
                $train['all_time'] = $this->getAllTimeFormat($all_time);
                //преобразуем даты для корректной вставки в input
                if ($id) {
                    $train['start'] = date('Y-m-d\TH:i:s', strtotime($train['start']));
                    $train['finish'] = date('Y-m-d\TH:i:s', strtotime($train['finish']));
                }
                $prepare_trains[] = $train;
            }
        }
        return $prepare_trains;
    }

    //метод который будет редактировать запись
    public function updateTrain(array $data)
    {
        if (isset($data['id']) && !empty($data['id'])) {
            //для редактирования существующего поезда по id
            $sql = 'UPDATE `trains` SET `train_n`="'.$data['train_n'].'", `way`="'.$data['way'].'", `start`="'.$data['start'].'", `finish`="'.$data['finish'].'", `price`='.$data['price'].' WHERE `id` = '.$data['id'];
        } else {
            //для создания нового поезда
            $sql = 'INSERT INTO `trains` (`id`, `train_n`,  `way`, `start`, `finish`, `price`) VALUES (null, "'.$data["train_n"].'","'.$data["way"].'","'.$data["start"].'","'.$data["finish"].'",'.$data["price"].')';
        }
        $this->db->query($sql);
    }

    //метод который будет возвращать время в формате (12ч 30м)
    public function getAllTimeFormat($seconds)
    {
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $minutes = $minutes - ($hours * 60);
        $time = $hours.'ч '.$minutes.'м';
        return $time;
    }
}