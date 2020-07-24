<?php

use \App\View\View;

require __DIR__ . '/autoload.php';

$view = new View();
$view
    ->display(__DIR__ . '/Templates/login.php');