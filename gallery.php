<?php

use \App\View\View;

require __DIR__ . '/autoload.php';

//сканируем дирректорию где содержатся изображения
//так же избавляемся от точек, которые scandir () обнаруживает в средах Linux
$images = array_diff(scandir(__DIR__.'/img'), array('..', '.'));

$view = new View();
$view
    ->assign(['images' => $images])
    ->display(__DIR__ . '/Templates/gallery.php');