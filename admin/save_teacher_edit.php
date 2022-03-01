<?php 
require_once '../database/connect_db.php';
$user_id        = $_GET['user_id'];
$email          = $_POST['email'];
$name           = $_POST['name'];
$firstName      = $_POST['firstName'];
$lastName       = $_POST['lastName'];
$password       = $_POST['password'];
$role       	= $_POST['role'];

$new_sql = "UPDATE teacher SET 
	email		=  '$email',
	name		=  '$name',
	first_name	=  '$firstName',
	last_name	=  '$lastName',
	password	=  '$password',	
	role		=  '$role'
WHERE id='$user_id'";
// var_dump($new_sql); die;
$result = mysqli_query($link, $new_sql);
if ($result) {
	header("Location: http://edu.rsukosygin.ru/admin/check_teacher.php");
} else {
	echo '<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">Загрузка не удалась';
}

?>
