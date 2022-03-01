<?php 
require_once '../database/connect_db.php';
$email          = $_POST['email'];
$name           = $_POST['name'];
$firstName      = $_POST['firstName'];
$lastName       = $_POST['lastName'];
$password       = $_POST['password'];
$role       	= $_POST['role'];
$new_sql="INSERT INTO teacher (email, name, first_name, last_name, password, role) VALUES('$email', '$name', '$firstName', '$lastName', '$password', '$role')";
$result = mysqli_query($link, $new_sql);
if ($result) {
	header("Location: http://edu.rsukosygin.ru/admin/check_teacher.php");
} else {
	echo "<!doctype html>
			<html lang='ru'>
    		<head>
        	<meta charset='utf-8'>Загрузка не удалась";
}

?>
