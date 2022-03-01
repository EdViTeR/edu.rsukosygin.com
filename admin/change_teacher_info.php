<?php 
require_once '../database/connect_db.php';
$user_id 	= $_GET['user_id'];
$email 		= $_POST['email'];
$name 		= $_POST['name'];
$password 	= $_POST['password'];
$role 		= $_POST['role'];

$new_sql = "UPDATE teacher SET email ='$email', name ='$name', password ='$password', role ='$role' WHERE id='$user_id'";
$result = mysqli_query($link, $new_sql);

if ($result) {
	header("Location: http://edu.rsukosygin.ru/admin/check_teacher.php");
} else {
	echo "Загрузка не удалась";
}

