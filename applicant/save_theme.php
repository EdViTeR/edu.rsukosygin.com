<?php 
session_start();
require_once '../vendor/autoload.php';
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';

$kurs_id 	= $_GET['kurs_id'];
$name 		= $_POST['theme_name'];
$info 		= $_POST['theme_info'];

$data = [
	'kurs_id' => $kurs_id,
	'name' => $name,
	'info' => $info,
];
$sql = "INSERT INTO `theme` SET `kurs_id` = :kurs_id, `name` = :name, `info` = :info";
$stmt= $dbo->prepare($sql);
$stmt->execute($data);

$_SESSION['access'] = 'Информация добавлена';
header('Location: view_kurs.php?kurs_id='.$kurs_id);
