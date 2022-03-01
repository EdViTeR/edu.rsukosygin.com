<?php 
require_once '../database/connect_db.php';
$author_name 	= $_POST['author_name'];
$author_reg  	= $_POST['author_reg'];
$user_id     	= $_GET['user_id'];
$kurs_id     	= $_GET['kurs_id'];

$new_sql="INSERT INTO author (kurs_id, author_name, author_reg) VALUES('$kurs_id', '$author_name', '$author_reg')";
$result = mysqli_query($link, $new_sql);
if ($result) {
	header("Location: http://edu.rsukosygin.ru/user/access.php?user_id=$user_id");
} else {
	echo "Загрузка не удалась";
}
?>
