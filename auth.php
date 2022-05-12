<?php

    session_start();
    require_once 'database/connect_db.php';
    
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $user = "SELECT * FROM teacher WHERE email='$email'";
    $mysql = mysqli_query($link, $user);
    $needUser = mysqli_fetch_assoc($mysql);

    if (password_verify($password, $needUser['password'])) {
        $_SESSION['user'] = [
            "id" => $needUser['id'],
            "email" => $needUser['email'],
            "name" => $needUser['name'],
            "first_name" => $needUser['first_name'],
            "last_name" => $needUser['last_name'],
            "kurs_id" => $needUser['kurs_id'],
            "role" => $needUser['role'],
        ];
        switch ($needUser['role']) {
            case '1':
                header("Location: user/user.php?user_id=$id"); //преподаватель
                break;
            case '2':
                header("Location: admin/check_teacher.php"); //админ
                break;
            case '3':
                header("Location: producer/check_teacher.php?prod_id=$id"); //продюссер
                break;
            case '4':
                header("Location: producer/check_teacher.php?prod_id=$id"); //пользователь
                break;
            case '5':
                header("Location: producer/check_teacher.php?prod_id=$id"); //эксперт
                break;
        } 
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header("Location: index.php");
    }

?>


