<?php 
require_once '../database/connect_db.php';
$user_id = $_GET['user_id'];
$kurs_id = $_GET['kurs_id'];

$query = ("INSERT INTO `author` SET `kurs_id` = :kurs_id, `user_id` = :user_id");
$params = [
	'kurs_id' 	=> $kurs_id,
	'user_id' 	=> $user_id,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);

header('Location: view_kurs.php?kurs_id=' . $kurs_id . '');