<?php 
require_once '../database/connect_db.php';
$user_id 		= $_GET['user_id'];
$kurs_id    	= $_GET['kurs_id'];
$author_id   	= $_GET['author_id'];

$new_sql = "DELETE FROM author WHERE id=$author_id ";
$result = mysqli_query($link, $new_sql);

if ($result) {
	header("Location: http://edu.rsukosygin.ru/user/edit_author_info.php?user_id=$user_id&kurs_id=$kurs_id");
} else {
	echo "Загрузка не удалась";
}

?>
