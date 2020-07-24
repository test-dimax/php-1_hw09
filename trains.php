<?php

use \App\Models\Trains;
use \App\View\View;

require __DIR__ . '/autoload.php';

$trains = new Trains();
$data = $trains->getTrains();

$view = new View();
$view
    ->assign(['trains' => $data])
    ->display(__DIR__ . '/Templates/trains.php');
