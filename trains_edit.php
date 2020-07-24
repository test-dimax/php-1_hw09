<?php

use \App\Models\Trains;
use \App\View\View;

require __DIR__ . '/autoload.php';

//если не пустой $_POST, то редактируем запись о поезде
if ( !empty($_POST) ) {
    $train = new Trains();
    $train->updateTrain($_POST);
    header('Location: /admin.php');
    exit;
//если нет массива $_POST, но мы получили по $_GET id, то открываем запись с поездом по заданному id
} elseif ( !empty($_GET['id']) ) {
    $trains = new Trains();
    $data = $trains->getTrains($_GET['id']);
    $view = new View();
    $view
        ->assign(['trains' => $data])
        ->display(__DIR__ . '/Templates/edit_train.php');
//иначе создаем новый поезд
} else {
    $view = new View();
    $view
        ->display(__DIR__ . '/Templates/edit_train.php');
}

