<?php 
require_once '../database/connect_db.php';
$kurs_id    	= $_GET['kurs_id'];
$author_id   	= $_GET['author_id'];

$new_sql = "DELETE FROM author WHERE id=$author_id ";
$result = mysqli_query($link, $new_sql);

if ($result) {
	header("Location: http://edu.rsukosygin.ru/admin/edit_author_info.php?kurs_id=$kurs_id");
} else {
	echo "Загрузка не удалась";
}

?>
