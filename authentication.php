<?php

use \App\Models\User;

require __DIR__ . '/autoload.php';

if (!empty($_POST)) {

    $user = new User();
    if ( $user->existsUser($_POST['login']) ) {
        $check_password = $user->checkPassword($_POST['login'], $_POST['password']);
        if ( $check_password ) {
            // Стартуем сессию
            session_start();
            $_SESSION['login'] = $_POST['login'];
            // если пользователь вошел то делаем редирект на админку
            header('Location: /admin.php');
            exit;
        } else {
            echo 'Пароль не соответствует! попробуйте снова! <a href="/login.php">Вход</a>';
            die;
        }
        header('Location: /admin.php');
        exit;
    } else {
        echo 'Извините, пользователь с данным логином не существует! <a href="/login.php">Вход</a>';
        die;
    }
}