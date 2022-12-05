<?php
session_start();
require_once '../database/connect_db.php';
$user_id 		= $_SESSION['user']['id'];
$kurs_id		= $_GET['kurs_id'];
$id				= $_GET['theme_id'];
$name 			= $_POST['theme_name'];
$info 			= $_POST['theme_info'];
$text_less 		= $_POST['text_less'];


$sql = "UPDATE theme SET name=?,info=?,text_less=? WHERE id=?";
$stmt= $dbo->prepare($sql);
$stmt->execute([$name, $info, $text_less, $id]);
header("Location: access.php");
