<?php
    include ("database/connect_db.php");
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $user = "SELECT * FROM teacher WHERE email='$email' and password='$password'";
    $mysql = mysqli_query($link, $user);
    $needUser = mysqli_fetch_all($mysql);
    if (!$needUser) {
        exit ("<!DOCTYPE html>
<html>
 <head>
  <meta charset='utf-8'>
  <title></title>
 </head>
 <body>Неверный логин или пароль<p><a href='index.php'><p> Назад </p></a></body>
</html>");
    }
    $id = $needUser[0][0];
    $role = $needUser[0][7];
    switch ($role) {
        case '1':
            header("Location: user/user.php?user_id=$id"); //преподаватель
            break;
        case '2':
            header("Location: admin/check_teacher.php"); //админ
            break;
        case '3':
            header("Location: producer/check_teacher.php?user_id=$id"); //продюссер
            break;
    }
?>


