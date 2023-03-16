<?php

session_start();
require_once 'database/databaseInfo.php';

$first_name 	= $_POST['first_name'];
$name 			= $_POST['name'];
$last_name 		= $_POST['last_name'];
$date 			= $_POST['radio'];


if (empty($first_name) || empty($name) || empty($date)) {
	$_SESSION['errors'] = 'Заполнены не все данные';
	header('Location: history_entry.php');
}


$query = ("INSERT INTO `history_entry` SET `first_name` = :first_name, `name` = :name, `last_name` = :last_name, `date` = :date");
$params = [
    'name' 			=> $name,
    'first_name' 	=> $first_name,
    'last_name' 	=> $last_name,
    'date' 			=> $date,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
if($stmt->rowCount() > 0) {
	$_SESSION['success'] = 'Вы успешно зарегистрированы';
} else {
	$_SESSION['errors'] = 'Что-то пошло не так. Проверьте правильно ли заполнены данные.';
}
header('Location: history_entry.php');
?>