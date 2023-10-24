<?php
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';

$kurs_id 	= $_GET['kurs_id'];
$name 		= $_POST['name'];
$email 		= $_POST['email'];

$all_emails = getEmail($dbo, $email);

if ($email === $all_emails['email']) {
	$_SESSION['bag'] = 'Этот Email уже зарегистрирован на курс!';
	header('Location: course.php?id='. $kurs_id . '#registration');
} else {
	$query = ("INSERT INTO `registration` SET `kurs_id` = :kurs_id, `name` = :name, `email` = :email");
	$params = [
	    'kurs_id' 		=> $kurs_id,
	    'name' 			=> $name,
	    'email' 		=> $email,
	];
	$stmt = $dbo->prepare($query);
	$stmt->execute($params);
	if($stmt->rowCount() > 0) {
		delete_history_date($dbo, $date);
		$_SESSION['success'] = 'Вы успешно зарегистрированы';
	} else {
		$_SESSION['bag'] = 'Что-то пошло не так. Проверьте правильно ли заполнены данные.';
	}
	header('Location: course.php?id='. $kurs_id);
}

