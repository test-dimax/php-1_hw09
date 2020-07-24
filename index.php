<?php

use \App\Models\Text;
use \App\View\View;


require __DIR__ . '/autoload.php';

$text = new Text();
$data = $text->getText();
$view = new View();
$view
    ->assign(['text' => $data])
    ->display(__DIR__ . '/Templates/index.php');
?>