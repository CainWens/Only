<?php
    session_start();
    require_once 'connect.php';

    $id = $_SESSION['user']['id'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass_conf = $_POST['pass_conf'];

    if($password === $pass_conf){

        $connect->query("UPDATE `only` SET 
        `name` = '$name',
        `tel` = '$tel',
        `email`='$email',
        `password`='$password' 
        WHERE `only`.`id` = $id
        ");

        $_SESSION['user']['name']=$name;
        $_SESSION['user']['tel']=$tel;
        $_SESSION['user']['email']=$email;
        $_SESSION['user']['password']=$password;

        $_SESSION['msg'] = 'Запись изменена';
        header('Location: ../profile');
    } else {
        $_SESSION['msg'] = 'Пароли не совпадают';
        header('Location: ../profile');
    }
    
?>