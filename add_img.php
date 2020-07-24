<?php

use \App\Models\Uploader;

require __DIR__ . '/autoload.php';

if ( !empty($_FILES['addimg']) && empty($_FILES['addimg']['error'])) {
    $area_name = 'addimg';
    $upload_img = new Uploader($area_name);
    $upload_img->upload();
    header('Location: /admin.php');
    exit;
} else {
    echo 'Вы не выбрали изображение! <br><a href="/admin.php">Обратно в админку</a>';
    die;
}

