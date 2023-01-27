<?php
session_start();
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';

$review = $_POST['review'];

$query = ("INSERT INTO `reviews` SET `review` = :review");
$params = [
    'review' 		=> $review,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);

$_SESSION['access'] = 'Информация добавлена, спасибо за отзыв!';
header('Location: reviews.php');
