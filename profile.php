<?php session_start(); 
if (!$_SESSION['user']){
    header('location: register');
}
require 'vendor/connect.php'
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['user']['name']?></title>
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
    <form action="vendor/update.php" method="post">
        <label>Логин <input type="text" name="name" value="<?= $_SESSION['user']['name']?>"></label>
        <label>Телефон <input maxlength="11" minlength="11"  type="number" name="tel" value="<?= $_SESSION['user']['tel']?>"></label>
        <label>Почта <input type="email" name="email" value="<?= $_SESSION['user']['email']?>"></label>
        <label>Пароль <input type="password" name="password" value="<?= $_SESSION['user']['password']?>"></label>
        <label>Повтор пароля <input type="password" name="pass_conf" value="<?= $_SESSION['user']['password']?>"></label>

        <button type="submit">Изменить</button>
        <?php
            if($_SESSION['msg']){
                echo ('<p class="msg">' . $_SESSION['msg'] . '</p>');
            }
            unset($_SESSION['msg']);
        ?>
    </form>
</body>
</html>