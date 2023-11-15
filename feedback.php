<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';
$name 				= htmlspecialchars($_POST['name']);
$email 				= htmlspecialchars($_POST['email']);
$message 			= htmlspecialchars($_POST['message']);
$query = ("INSERT INTO `feedback` SET `name` = :name, `email` = :email, `message` = :message");
$params = [
    'name' 			=> $name,
    'email' 		=> $email,
    'message' 		=> $message,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
$_SESSION['access'] = 'Ваше сообщение отправлено';
header('Location: index.php');
?>