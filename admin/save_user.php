<?php
session_start();
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';

$first_name 		= mb_strtolower(htmlspecialchars($_POST['first_name']));
$name 				= mb_strtolower(htmlspecialchars($_POST['name']));
$last_name 			= mb_strtolower(htmlspecialchars($_POST['last_name']));
$email 				= htmlspecialchars($_POST['email']);
$password 			= htmlspecialchars($_POST['password']);
$repeat_password 	= htmlspecialchars($_POST['repeat_password']);
$role 				= htmlspecialchars($_POST['role']);

if ($password === $repeat_password) {
	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = ("INSERT INTO `teacher` SET `email` = :email, `name` = :name, `first_name` = :first_name, `last_name` = :last_name, `password` = :password, `role` = :role");
	$params = [
		'email' 		=> $email,
		'name' 			=> $name,
		'first_name' 	=> $first_name,
		'last_name' 	=> $last_name,
		'password' 		=> $password,
		'role' 			=> $role,
	];
	$stmt = $dbo->prepare($query);
	$stmt->execute($params);
	$_SESSION['add_status'] = '1';
	header('Location: add_teacher.php');
} else {
	$_SESSION['add_status'] = '2';
	header('Location: add_teacher.php');
}