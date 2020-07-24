<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница входа</title>
</head>
<body>
<h2>Введите пожалуйста логин и пароль</h2>
<form action="/authentication.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="login" required>
    <input type="password" name="password" required>
    <button type="submit">Войти</button>
</form>
</body>
</html>
