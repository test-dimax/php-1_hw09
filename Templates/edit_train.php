<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Расписание поездов</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <h1>Редактирование поезда</h1>
    <nav>
        <ul>
            <li><a href="/">Главная страница</a></li>
            <li><a href="/gallery.php">Фотогалерея</a></li>
            <li><a href="/trains.php">Расписание поездов</a></li>
            <li><a href="/admin.php">Панель администратора</a></li>
        </ul>
    </nav>

            <?php
            if ( !empty($this->data['trains']) ) {
                foreach ($this->data['trains'] as $key => $value) {
                    ?>
                    <form action="/trains_edit.php" method="POST" enctype="multipart/form-data">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>">
                        <input name="train_n" type="text" value="<?php echo $value['train_n']; ?>">
                        <input name="way" type="text" value="<?php echo $value['way']; ?>">
                        <input name="start" type="datetime-local" value="<?php echo $value['start']; ?>">
                        <input name="finish" type="datetime-local" value="<?php echo $value['finish']; ?>">
                        <input name="price" type="number" value="<?php echo $value['price']; ?>">
                        <button type="submit">Сохранить</button>
                    </form>
                    <?php
                }
            } else {
            ?>
                <h2>Добавить новый поезд</h2>
                <form action="/trains_edit.php" method="POST" enctype="multipart/form-data">
                        <input name="train_n" type="text">
                        <input name="way" type="text">
                        <input name="start" type="datetime-local">
                        <input name="finish" type="datetime-local">
                        <input name="price" type="number">
                        <button type="submit">Сохранить</button>
                    </form>
            <?php
            }
            ?>

</div>
</body>
</html>