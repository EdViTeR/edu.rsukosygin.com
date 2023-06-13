<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';


$user_id 		= $_SESSION['user']['id'];
$kurs_name 		= htmlspecialchars($_POST['kurs_name']);
$description	= htmlspecialchars($_POST['description']);
$lection 		= htmlspecialchars($_POST['lection']);
$task 			= htmlspecialchars($_POST['task']);
$sertificate 	= htmlspecialchars($_POST['sertificate']);
$for_whom 		= htmlspecialchars($_POST['for_whom']);
$why 			= htmlspecialchars($_POST['why']);


function debug($data) {
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

$labels = [
	'kurs_name' 	=> 'Название курса',
	'description' 	=> 'Описание',
	'lection' 		=> 'Лекции',
	'task' 			=> 'Задания',
	'sertificate' 	=> 'Сертификат',
	'for_whom' 		=> 'Для кого',
	'why' 			=> 'Зачем',
];
$rules = [
	'required' => ['kurs_name', 'description', 'lection', 'task', 'sertificate', 'for_whom', 'why'],
];

if (!empty($_POST)) {
	\Valitron\Validator::langDir('../vendor/lang');
	\Valitron\Validator::lang('ru');
	$v = new Valitron\Validator($_POST);
	$v->labels($labels);
	$v->rules($rules);
	if ($v->validate()) {
		$query = ("INSERT INTO `order_kurs_2023` SET `user_id` = :user_id, `kurs_name` = :kurs_name, `description` = :description, `lection` = :lection, `task` = :task, `sertificate` = :sertificate, `for_whom` = :for_whom, `why` = :why");
		$params = [
		    'user_id' 				=> $user_id,
		    'kurs_name' 			=> $kurs_name,
		    'description'			=> $description,
		    'lection' 				=> $lection,
		    'task' 					=> $task,
		    'sertificate' 			=> $sertificate,
		    'for_whom' 				=> $for_whom,
		    'why' 					=> $why,
		];
		$stmt = $dbo->prepare($query);
		$stmt->execute($params);
        $_SESSION['kurs_info'][] = [
		    'user_id' 				=> $user_id,
		    'kurs_name' 			=> $kurs_name,
		    'description'			=> $description,
		    'lection' 				=> $lection,
		    'task' 					=> $task,
		    'sertificate' 			=> $sertificate,
		    'for_whom' 				=> $for_whom,
		    'why' 					=> $why,
        ];
		$_SESSION['access'] = 'Информация добавлена';
		header('Location: kurses.php');
		die;
	} else {
		$errors = '<ul>';
		foreach ($v->errors() as $error) {
			foreach ($error as $item) {
				$errors .= '<li>' . $item . '</li>';
			}
		}
		$errors .= '</ul>';
		$_SESSION['errors'] = $errors;
		header('Location: add_kurs_info.php');
		die;
	}
}