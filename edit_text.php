<?php

use \App\Models\Text;

require __DIR__ . '/autoload.php';

if ( !empty($_POST['text'])) {
    $text = new Text();
    $text->updateText($_POST['text']);
    header('Location: /');
    exit;
} else {
    echo 'Вы не заполнили поле с текстом! <br><a href="/admin.php">Обратно в админку</a>';
    die;
}