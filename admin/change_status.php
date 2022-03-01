<?php 
require_once '../database/connect_db.php';
$status = $_GET['status'];
$kurs_id = $_GET['kurs_id'];

if ($status == 0) {
	$status = 1;
} else {
	$status = 0;
}

$new_sql = "UPDATE teach_kurs SET status ='$status' WHERE id='$kurs_id'";
$result = mysqli_query($link, $new_sql);

if ($result) {
	header("Location: http://edu.rsukosygin.ru/admin/view_kurs.php?kurs_id=$kurs_id");
} else {
	echo "Загрузка не удалась";
}