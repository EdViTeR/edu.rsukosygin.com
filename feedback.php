<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';
$name 				= htmlspecialchars($_POST['name']);
$mail 				= htmlspecialchars($_POST['mail']);
$feedback 			= htmlspecialchars($_POST['feedback']);
$query = ("INSERT INTO `feedback` SET `name` = :name, `mail` = :mail, `feedback` = :feedback");
$params = [
    'name' 			=> $name,
    'mail' 			=> $mail,
    'feedback' 		=> $feedback,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
$_SESSION['access'] = 'Ваше сообщение отправлено';
header('Location: index.php');
?>