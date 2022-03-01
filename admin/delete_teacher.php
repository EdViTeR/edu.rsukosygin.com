<?php
require_once '../database/connect_db.php';
include ("../database/databaseInfo.php");
$user_id = $_GET['user_id'];
$user = user($link, $user_id);
$sql = "DELETE FROM teacher WHERE id=$user_id";
$result = mysqli_query($link, $sql);

if ($result) {
	foreach ($user as $key => $value) {
		$data = implode("|", $value);
	}
	$new_sql="INSERT INTO deleted (data) VALUES('$data')";
	$result_del = mysqli_query($link, $new_sql);
	header("Location: http://edu.rsukosygin.ru/admin/check_teacher.php");
} else {
	echo "<!doctype html>
			<html lang='ru'>
    		<head>
        	<meta charset='utf-8'>Удаление не удалось";
}