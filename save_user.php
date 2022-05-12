<?php

	session_start();
	require_once 'database/connect_db.php';
	
	$firstName 			= htmlspecialchars($_POST['firstName']);
	$name 				= htmlspecialchars($_POST['name']);
	$lastName 			= htmlspecialchars($_POST['lastName']);
	$email 				= htmlspecialchars($_POST['email']);
	$password 			= htmlspecialchars($_POST['password']);
	$repeat_password 	= htmlspecialchars($_POST['repeat_password']);
	$role 				= htmlspecialchars($_POST['role']);
	
	if ($password === $repeat_password) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$new_sql="INSERT INTO teacher (email, name, first_name, last_name, password, role) VALUES('$email', '$name', '$firstName', '$lastName', '$password', '$role')";
		$result = mysqli_query($link, $new_sql);
		$_SESSION['access'] = 'Регистрация прошла успешно!';
		header('Location: index.php');
	} else {
		$_SESSION['message'] = 'Пароли не совпадают';
		header('Location: sign_up.php');
	}







?>