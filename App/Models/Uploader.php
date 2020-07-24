<?php


namespace App\Models;


class Uploader
{

    public $area_name;
    public $final_filename;
    // В конструктор передается имя поля формы, от которого мы ожидаем загрузку файла
    public function __construct($area_name)
    {
        $this->area_name = $area_name;
    }

    //Метод isUploaded() проверяет - был ли загружен файл от данного имени поля
    public function isUploaded() {
        //проверяем массив $_FILES на элемент с ключем который мы ожидаем от формы
        if (isset($_FILES[$this->area_name])) {
            return true;
        } else {
            return false;
        }
    }

    //Метод upload() осуществляет перенос файла (если он был загружен!) из временного места в постоянное
    public function upload()
    {
        if ( $this->isUploaded() ) {
            //если файл был загружен из нужного нам поля, то перемещаем его в нужную нам директорию
            //составляем имя файла
            $this->final_filename = $this->setFileName();
            move_uploaded_file(
                $_FILES[$this->area_name]['tmp_name'],
                $this->final_filename
            );
            return true;
        } else {
            return false;
        }
    }

    //Метод составляет имя файла
    protected function setFileName()
    {
        $filename = $_FILES[$this->area_name]['name'];

        $images = array_diff(scandir(__DIR__.'/../../img/'), array('..', '.'));
        if (!in_array($filename, $images)) {
            $final_filename = __DIR__.'/../../img/'.$filename;
        } else {
            $final_filename = __DIR__.'/../../img/'.time().$filename;
        }
        return $final_filename;
    }
}