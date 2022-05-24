<?php

    session_start();
    require_once 'database/connect_db.php';
    require_once 'database/databaseInfo.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_data = user($dbo, $email);

    if (password_verify($password, $user_data['password'])) {
        $_SESSION['user'] = [
            "id" => $user_data['id'],
            "email" => $user_data['email'],
            "name" => $user_data['name'],
            "first_name" => $user_data['first_name'],
            "last_name" => $user_data['last_name'],
            "kurs_id" => $user_data['kurs_id'],
            "role" => $user_data['role'],
        ];
        switch ($user_data['role']) {
            case '1':
                header("Location: user/user.php?user_id=$id"); //преподаватель
                break;
            case '2':
                header("Location: admin/check_teacher.php"); //админ
                break;
            case '3':
                header("Location: producer/check_teacher.php"); //продюссер
                break;
            case '4':
                header("Location: applicant/check_teacher.php"); //пользователь
                break;
            case '5':
                header("Location: expert/check_teacher.php"); //эксперт
                break;
        } 
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header("Location: index.php");
    }

?>


