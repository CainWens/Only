<?php session_start(); 
    if($_SESSION['user']){
        header('location: ../profile');
    } else {
        header('location: ../auth');
    }
    require_once 'connect.php';

    $login = $_POST['name'];
    $password = $_POST['password'];
    $captcha = $_POST['smart-token'];

    if(strlen($captcha)>0){
        if(strpos($login,'@')!== false){
        $chek_user = $connect->query("SELECT * FROM `only` WHERE `email` = '$login' AND `password` = '$password'");
        if(mysqli_num_rows($chek_user) > 0){
            $user = mysqli_fetch_assoc($chek_user);
            $_SESSION['user'] = [
                "id" => $user['id'],
                "name" => $user['name'],
                "tel" => $user['tel'],
                "email" => $user['email'],
                "password" => $user['password'],
            ];
            header('Location: ../profile');
        } else {
            $_SESSION['msg'] = 'Такого email нет';
            header('Location: ../auth');
        }
    } else {
        $chek_user = $connect->query("SELECT * FROM `only` WHERE `tel` = '$login' AND `password` = '$password'");
        if(mysqli_num_rows($chek_user) > 0){
            $user = mysqli_fetch_assoc($chek_user);
            $_SESSION['user'] = [
                "id" => $user['id'],
                "name" => $user['name'],
                "tel" => $user['tel'],
                "email" => $user['email'],
                "password" => $user['password'],
            ];
            header('Location: ../profile');
        } else {
            $_SESSION['msg'] = 'Такого номера нет';
            header('Location: ../auth');
        }
    }
    }else{
        $_SESSION['msg'] = 'Капча не пройдена';
        header('Location: ../auth');
    }
    
?>
