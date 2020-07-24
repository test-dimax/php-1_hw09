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
    <h1>Добро пожаловать в Ставрополь</h1>
    <nav>
        <ul>
            <li><a href="/">Главная страница</a></li>
            <li><a href="/gallery.php">Фотогалерея</a></li>
            <li><a href="/trains.php">Расписание поездов</a></li>
            <li><a href="/admin.php">Панель администратора</a></li>
        </ul>
    </nav>
    <div class="main_image">
        <img src="\img\welcome.jpg" alt="">
    </div>
    <div class="text">
        <?php echo $this->data['text'];?>
    </div>
</div>
</body>
</html>