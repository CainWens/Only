<?php
session_start();
if($_SESSION['user']){
    header('location: profile');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Only | Регистрация</title>
</head>
<body>
    <menu>
        <h1>Only</h1>

        <?php
            if($_SESSION['user']){
                echo('
                <div class="controls-menu">
                    <a href="/">Главная</a>
                    <a href="profile">Профиль</a>
                    <a href="exit">Выход</a>
                </div>
                ');
            } else{
                echo('
                <div class="controls-menu">
                    <a href="/">Главная</a>
                    <a href="profile">Профиль</a>
                    <a href="register">Регистрация</a>
                    <a href="auth">Авторизация</a>
                </div>
                ');
            }
        ?>
    </menu>
    <form action="vendor/signup.php" method="post">
        <div class="controls-form">
            <a class="gray" href="#">Регистрация</a>
            <a href="auth">Авторизация</a>
        </div>
        <label>Логин <input type="text" name="name"></label>
        <label>Телефон <input maxlength="11" minlength="11" type="number" name="tel"></label>
        <label>Почта <input type="email" name="email"></label>
        <label>Пароль <input type="password" name="password"></label>
        <label>Повтор пароля <input type="password" name="pass_conf"></label>

        <button type="submit">Зарегистрироваться</button>
        <?php
            if($_SESSION['msg']){
                echo ('<p class="msg">' . $_SESSION['msg'] . '</p>');
            }
            unset($_SESSION['msg']);
        ?>
    </form>
</body>
</html>