<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <h1>Панель администратора</h1>
    <nav>
        <ul>
            <li><a href="/">Главная страница</a></li>
            <li><a href="/gallery.php">Фотогалерея</a></li>
            <li><a href="/trains.php">Расписание поездов</a></li>
            <li><a href="/admin.php">Панель администратора</a></li>
        </ul>
    </nav>
    <h2>Редактировать приветственный текст</h2>
    <form action="/edit_text.php" method="POST" enctype="multipart/form-data">
    <textarea name="text">
        <?php echo $this->data['text'];?>
    </textarea>
        <button type="submit">Изменить</button>
    </form>
    <h2>Добавьте изображение в галерею</h2>
    <div class="image_list admin">
        <?php
        if ( !empty($this->data['images']) ) {
            foreach ($this->data['images'] as $key => $value) {
                ?>
                <img src="/img/<?php echo $value; ?>" alt="">
                <?php
            }
        } else {
            echo 'Изображений нет. Добавьте пожалуйста изображения в панели администратора';
        }
        ?>
    </div>
    <form action="/add_img.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="addimg">
        <button type="submit">добавить файл</button>
    </form>
    <h2>Редактировать расписание поездов</h2>
    <table class="admin_trains">
        <tr>
            <th>Поезд</th>
            <th>Маршрут</th>
            <th>Отправление</th>
            <th>Прибытие</th>
            <th>В пути</th>
            <th>Цена</th>
            <th></th>
        </tr>
            <?php
            if ( !empty($this->data['trains']) ) {
                foreach ($this->data['trains'] as $key => $value) {
                    ?>
                <tr>
                    <td><?php echo $value['train_n']; ?></td>
                    <td><?php echo $value['way']; ?></td>
                    <td><?php echo $value['start']; ?></td>
                    <td><?php echo $value['finish']; ?></td>
                    <td><?php echo $value['all_time']; ?></td>
                    <td><?php echo $value['price']; ?> руб.</td>
                    <td><a href="/trains_edit.php?id=<?php echo $value['id']; ?>">Редактировать</a></td>
                </tr>
                    <?php
                }
            } else {
                echo 'Извините, расписание на модерации';
            }
            ?>
    </table>
    <a href="/trains_edit.php">Добавить новый поезд</a>

</div>
</body>
</html><?php
