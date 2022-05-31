<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';

$phone 					= htmlspecialchars($_POST['phone']);
$academic_degree_title	= htmlspecialchars($_POST['academic_degree_title']);
$academic_degree 		= htmlspecialchars($_POST['academic_degree']);
$academic_title 		= htmlspecialchars($_POST['academic_title']);
$job_place 				= htmlspecialchars($_POST['job_place']);
$department 			= htmlspecialchars($_POST['department']);
$job_title 				= htmlspecialchars($_POST['job_title']);

function debug($data) {
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

$labels = [
	'phone' => 'Телефон',
	'academic_degree_title' => 'Ученая степень',
	'academic_degree' => 'Ученая степень (наука)',
	'academic_title' => 'Ученое звание',
	'job_place' => 'Место работы',
	'department' => 'Отдел',
	'job_title' => 'Должность',
];
$rules = [
	'required' => ['phone', 'academic_degree_title', 'academic_degree', 'academic_title', 'job_place', 'department', 'job_title'],
    // ['phone', 'match', 'pattern' => '/^(8)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Телефона, должно быть в формате 8(XXX)XXX-XX-XX'],
];

if (!empty($_POST)) {
	\Valitron\Validator::langDir('../vendor/lang');
	\Valitron\Validator::lang('ru');
	$v = new Valitron\Validator($_POST);
	$v->labels($labels);
	$v->rules($rules);
	if ($v->validate()) {
		// $query = ("INSERT INTO `teacher` SET `email` = :email, `name` = :name, `first_name` = :first_name, `last_name` = :last_name, `password` = :password, `role` = :role");
		// $params = [
		//     'email' 		=> $email,
		//     'name' 			=> $name,
		//     'first_name' 	=> $first_name,
		//     'last_name' 	=> $last_name,
		//     'password' 		=> $password,
		//     'role' 			=> $role,
		// ];
		// $stmt = $dbo->prepare($query);
		// $stmt->execute($params);
		$_SESSION['access'] = 'Информация добавлена';
		header('Location: add_user_info.php');
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
		header('Location: add_user_info.php');
		die;
	}
}