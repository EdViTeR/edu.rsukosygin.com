<?php 
session_start();
require_once '../database/connect_db.php';
$user_id        = $_SESSION['user']['id'];
$kurs_id        = $_GET['kurs_id'];
$name           = $_POST['theme_name'];
$info           = $_POST['theme_info'];
$text_less      = $_POST['text_less'];


$query = ("INSERT INTO `theme` SET `kurs_id` = :kurs_id, `name` = :name, `info` = :info, `text_less` = :text_less");
$params = [
    'kurs_id' 	=> $kurs_id,
    'name' 		=> $name,
    'info' 		=> $info,
    'text_less' => $text_less,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
header("Location: access.php");

?>
