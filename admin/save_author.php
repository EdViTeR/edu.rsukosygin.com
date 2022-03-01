<?php 
require_once '../database/connect_db.php';
$author_name 	= $_POST['author_name'];
$author_reg  	= $_POST['author_reg'];
$kurs_id     	= $_GET['kurs_id'];

$new_sql="INSERT INTO author (kurs_id, author_name, author_reg) VALUES('$kurs_id', '$author_name', '$author_reg')";
$result = mysqli_query($link, $new_sql);
if ($result) {
	header("Location: http://edu.rsukosygin.ru/admin/view_kurs.php?kurs_id=$kurs_id");
} else {
	echo "Загрузка не удалась";
}
?>
