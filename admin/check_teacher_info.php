<?php 
session_start();
$_SESSION['user'] = [
    "id" => 46,
    "email" => 'ruchkina-ag@rguk.ru',
    "name" => 'asd',
    "first_name" => 'asd',
    "last_name" => 'asd',
    "kurs_id" => 21,
    "role" => 4,
    // "photo" => ,
];


header("Location: ../applicant/user.php");