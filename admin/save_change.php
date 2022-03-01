<?php 
require_once '../database/connect_db.php';
$id = 0;
$name           = $_POST['name'];
$data           = $_POST['data'];
$time           = $_POST['time'];
$for_whom       = $_POST['for_whom'];
$why            = $_POST['why'];
$author         = $_POST['author'];
$prog           = $_POST['prog'];
$author_info    = $_POST['author_info'];
$author_photo   = $_POST['author_photo'];
$new_sql = "UPDATE kurses SET name='$name', data='$data', time='$time', for_whom='$for_whom', why='$why', author='$author', author_info='$author_info' WHERE id='$id'";
$result = mysqli_query($link, $new_sql);
if ($result) {
	header("Location: http://edu.rsukosygin.ru/admin/check_teacher.php");
} else {
	echo "Загрузка не удалась";
}

?>
