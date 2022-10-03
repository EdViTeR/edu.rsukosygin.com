<?php
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';

$id = $_GET['themes_id'];
$kurs_id = $_GET['kurs_id'];
$name = $_POST['theme_name'];
$info = $_POST['theme_info'];

$sql = "UPDATE theme SET name=?,info=? WHERE id=?";
$stmt= $dbo->prepare($sql);
$stmt->execute([$name, $info, $id]);
header("Location: view_kurs.php?kurs_id=$kurs_id");
