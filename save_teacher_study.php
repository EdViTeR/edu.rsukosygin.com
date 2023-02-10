<?php

session_start();
require_once 'database/databaseInfo.php';

$first_name 	= $_POST['first_name'];
$name 			= $_POST['name'];
$last_name 		= $_POST['last_name'];
$date 			= $_POST['radio'];

switch ($date) {
	case '1':
		$need_time = '28.02';
		break;
	case '2':
		$need_time = '28.02';
		break;
	case '3':
		$need_time = '02.03';
		break;
	case '4':
		$need_time = '02.03';
		break;
	case '5':
		$need_time = '03.03';
		break;
	case '6':
		$need_time = '03.03';
		break;
	case '7':
		$need_time = '09.03';
		break;
	case '8':
		$need_time = '09.03';
		break;
	
	default:
		break;
}

$query = ("INSERT INTO `teacher_study` SET `first_name` = :first_name, `name` = :name, `last_name` = :last_name, `date` = :date");
$params = [
    'name' 			=> $name,
    'first_name' 	=> $first_name,
    'last_name' 	=> $last_name,
    'date' 			=> $need_time,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
if($stmt->rowCount() > 0) {
	$_SESSION['success'] = 'Вы успешно зарегистрированы';
} else {
	$_SESSION['errors'] = 'Что-то пошло не так';
}
header('Location: teacher_study.php');
?>