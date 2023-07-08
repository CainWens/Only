<?php
    session_start();
    if($_SESSION['user']){
        header('location: ../profile.php');
    } else {
        header('location: ../auth.php');
    }

    require_once 'connect.php';

    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass_conf = $_POST['pass_conf'];
    
    if (empty($name)){
        $_SESSION['msg'] = 'Введите имя';
        header('Location: ../register');
    } else {
        if (empty($tel)){
            $_SESSION['msg'] = 'Введите телефон';
            header('Location: ../register');
        } else {
            if (empty($email)){
            $_SESSION['msg'] = 'Введите email';
            header('Location: ../register');
            } else {
                if (empty($password)){
                $_SESSION['msg'] = 'Введите пароль';
                header('Location: ../register');
                } else {
                    if (chek_tel() > 0){
                        $_SESSION['msg'] = 'Такой номер уже зарегистрирован';
                        header('Location: ../register');
                    } else{
                        if(chek_name() > 0){
                            $_SESSION['msg'] = 'Такой логин уже зарегистрирован';
                            header('Location: ../register');
                        } else{
                            if(chek_email() > 0){
                                $_SESSION['msg'] = 'Такой email уже зарегистрирован';
                                header('Location: ../register');
                            } else {
                                if($password === $pass_conf){
                                    $connect->query("INSERT INTO `only` (`id`, `name`, `tel`, `email`, `password`) 
                                                        VALUES (NULL, '$name', '$tel', '$email', '$password')");
                                    $_SESSION['msg'] = 'Регистрация прошла успешно';
                                    header('Location: ../auth');
                                } else {
                                    $_SESSION['msg'] = 'Пароли не совпадают';
                                    header('Location: ../register');
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function chek_name(){
        $ch_name = $connect->query("SELECT * FROM `only` WHERE `name` = '$name'");
        return $ch_name = mysqli_num_rows($chek_name);
    }
    function chek_tel(){
        $ch_tel = $connect->query("SELECT * FROM `only` WHERE `tel` = '$tel'");
        return $ch_tel = mysqli_num_rows($ch_tel);
    }
    function chek_email(){
        $ch_email = $connect->query("SELECT * FROM `only` WHERE `email` = '$email'");
        return $ch_email = mysqli_num_rows($ch_email);
    }
?>