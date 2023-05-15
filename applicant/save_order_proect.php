<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';

$kurs_name 			= htmlspecialchars($_POST['kurs_name']);
$description		= htmlspecialchars($_POST['description']);
$lections 			= htmlspecialchars($_POST['lections']);
$tasks 				= htmlspecialchars($_POST['tasks']);
$certificate 		= htmlspecialchars($_POST['certificate']);
$for_whom 			= htmlspecialchars($_POST['for_whom']);
$why 				= htmlspecialchars($_POST['why']);
$user_id 			= $_SESSION['user']['id'];
$status 			= 1;

function debug($data) {
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

$labels = [
	'kurs_name' => 'Телефон',
	'description' => 'Ученая степень',
	'lections' => 'Ученая степень (наука)',
	'tasks' => 'Ученое звание',
	'certificate' => 'Место работы',
	'for_whom' => 'Должность',
	'why' => 'О себе',
	'status' => 'О себе',
];
$rules = [
	'required' => ['kurs_name', 'description', 'lections', 'tasks', 'certificate', 'for_whom', 'why'],
    // ['phone', 'match', 'pattern' => '/^(8)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Телефона, должно быть в формате 8(XXX)XXX-XX-XX'],
];

if (!empty($_POST)) {
	\Valitron\Validator::langDir('../vendor/lang');
	\Valitron\Validator::lang('ru');
	$v = new Valitron\Validator($_POST);
	$v->labels($labels);
	$v->rules($rules);
	if ($v->validate()) {
		$query = ("INSERT INTO `sereegak_teacher`.`order_2023` SET `user_id` = :user_id, `kurs_name` = :kurs_name, `description` = :description, `lections` = :lections, `tasks` = :tasks, `certificate` = :certificate, `for_whom` = :for_whom, `why` = :why, `status` = :status");
		$params = [
		    'user_id' 				=> $user_id,
		    'kurs_name' 			=> $kurs_name,
		    'description'			=> $description,
		    'lections' 				=> $lections,
		    'tasks' 				=> $tasks,
		    'certificate' 			=> $certificate,
		    'for_whom' 				=> $for_whom,
		    'why' 					=> $why,
		    'status' 				=> $status,
		];
		$stmt = $dbo->prepare($query);
		$stmt->execute($params);
        $_SESSION['kurs_info'][] = [
		    'user_id' 				=> $user_id,
		    'kurs_name' 			=> $kurs_name,
		    'description'			=> $description,
		    'lections' 				=> $lections,
		    'tasks' 				=> $tasks,
		    'certificate' 			=> $certificate,
		    'for_whom' 				=> $for_whom,
		    'why' 					=> $why,
		    'status' 				=> $status,
        ];
		$_SESSION['access'] = 'Информация добавлена';
		header('Location: user.php');
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
		header('Location: user.php');
		die;
	}
}