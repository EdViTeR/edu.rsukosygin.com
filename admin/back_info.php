<?php
require_once '../database/connect_db.php';
include ("../database/databaseInfo.php");
$id = $_GET['id'];
$info = deletedTeacher($link, $id); 
foreach ($info as $key => $value) {
	$needInfo = explode("|", $value[1]);
	$email		=	$needInfo[1];
	$name 		=	$needInfo[2];
	$password	=	$needInfo[4];
	$role		=	$needInfo[5];	
}
$new_sql="INSERT INTO teacher (email, name, password, role) VALUES('$email', '$name', '$password', '$role')";
$result = mysqli_query($link, $new_sql);
if ($result) {
	$sql = "DELETE FROM deleted WHERE id=$id";
	$result = mysqli_query($link, $sql);
	header("Location: http://edu.rsukosygin.ru/admin/delete_info.php");
} else {
	echo "<!doctype html>
			<html lang='ru'>
    		<head>
        	<meta charset='utf-8'>Загрузка не удалась";
}