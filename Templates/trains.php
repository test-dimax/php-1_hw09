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
        <h1>Расписание поездов</h1>
        <nav>
            <ul>
                <li><a href="/">Главная страница</a></li>
                <li><a href="/gallery.php">Фотогалерея</a></li>
                <li><a href="/trains.php">Расписание поездов</a></li>
                <li><a href="/admin.php">Панель администратора</a></li>
            </ul>
        </nav>
        <table>
            <tr>
                <th>Поезд</th>
                <th>Маршрут</th>
                <th>Отправление</th>
                <th>Прибытие</th>
                <th>В пути</th>
                <th>Цена</th>
            </tr>
            <tr>
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
                        </tr>
                        <?php
                    }
                } else {
                    echo 'Извините, расписание на модерации';
                }
                ?>
            </tr>
        </table>

    </div>
</body>
</html>