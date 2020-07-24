<?php

use \App\Models\Text;
use \App\View\View;
use \App\Models\Trains;

require __DIR__ . '/autoload.php';

// Стартуем сессию
session_start();

if ( isset($_SESSION['login']) && !empty($_SESSION['login']) ) {
    $text = new Text();
    $data = $text->getText();
    $images = array_diff(scandir(__DIR__.'/img'), array('..', '.'));
    $trains = new Trains();
    $trains = $trains->getTrains();

    $view = new View();
    $view
        ->assign(['text' => $data, 'images' => $images, 'trains' => $trains])
        ->display(__DIR__ . '/Templates/admin.php');
} else {
    header('Location: /login.php');
    exit;
}

