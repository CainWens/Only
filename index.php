<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Only | Главная</title>
</head>
<body>
    <menu>
        <h1>Only</h1>

        <?php
            if($_SESSION['user']){
                echo('
                <div class="controls-menu">
                    <a href="profile">Профиль</a>
                    <a href="exit">Выход</a>
                </div>
                ');
            } else{
                echo('
                <div class="controls-menu">
                    <a href="profile">Профиль</a>
                    <a href="register">Регистрация</a>
                    <a href="auth">Авторизация</a>
                </div>
                ');
            }
        ?>
    </menu>
    <div class="content">
        <h1>Lorem ipsum dolor sit amet.</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore iusto id atque impedit aliquam quis ipsa earum vero fugiat eos consequatur, maxime, necessitatibus aperiam, optio vel! Accusamus voluptatibus consequuntur vel, optio rerum omnis molestiae ab? Quidem perferendis accusantium magnam porro earum temporibus vel consectetur similique ipsa blanditiis possimus repudiandae id, autem accusamus? Velit laudantium similique consectetur? Ratione beatae sed neque molestias, ipsam explicabo hic, laboriosam enim amet incidunt fuga deleniti adipisci ea eius minima nostrum porro temporibus obcaecati similique expedita inventore debitis dolor cupiditate officia? Ex nemo veritatis, quis iure ratione animi adipisci, tenetur mollitia fugit dolore et, autem commodi!</p>
    </div>
</body>
</html>