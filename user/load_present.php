<?php
require_once '../database/connect_db.php';
$id = $_GET['theme_id'];
$user_id = $_GET['user_id'];
$uploaddir = '../user/files/';
$uploadname = $uploaddir . $_FILES['userfile']['name'];
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadname)) {
    $sql="UPDATE themes SET present_name ='$uploadname', present_path ='$uploadname' WHERE id='$id'";
	$result = mysqli_query($link, $sql);
    	header("Location: access.php?user_id=$user_id");
    } else { 
		echo 'Ошибка';
	}
