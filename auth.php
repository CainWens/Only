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
    <script>
      function callback(token) {
        console.log(callback);
      }
    </script>
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" async defer></script>
    <title>Only | Авторизация</title>
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
    <form action="vendor/signin.php" method="post">
        <div class="controls-form">
            <a href="register">Регистрация</a>
            <a href="#" class="gray">Авторизация</a>
        </div>
        <label>Телефон или почта <input type="text" name="name"></label>
        <label>Пароль <input type="password" name="password"></label>
        <div
        id="captcha-container"
        class="smart-captcha"
        data-sitekey="ysc1_1IrEi3LHPmY93OoembLbvREKbK0DEgmrbcZe2JFEc04ade45"
        data-hl="ru"
        data-callback="callback"
      >
      <input type="hidden" name="smart-token">
    </div>
        <button type="submit">Вход</button>
        <?php
            if($_SESSION['msg']){
                echo ('<p class="msg">' . $_SESSION['msg'] . '</p>');
            }
            unset($_SESSION['msg']);
        ?>
    </form>
</body>
</html>