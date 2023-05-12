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
$about 					= htmlspecialchars($_POST['about']);
$user_id 				= $_SESSION['user']['id'];

$full_academic_degree = $academic_degree_title . $academic_degree;

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
	'about' => 'О себе',
];
$rules = [
	'required' => ['phone', 'academic_degree_title', 'academic_degree', 'academic_title', 'job_place', 'department', 'job_title', 'about'],
    // ['phone', 'match', 'pattern' => '/^(8)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Телефона, должно быть в формате 8(XXX)XXX-XX-XX'],
];

if (!empty($_POST)) {
	\Valitron\Validator::langDir('../vendor/lang');
	\Valitron\Validator::lang('ru');
	$v = new Valitron\Validator($_POST);
	$v->labels($labels);
	$v->rules($rules);
	if ($v->validate()) {
		$query = ("INSERT INTO `user_info` SET `user_id` = :user_id, `phone` = :phone, `academic_degree` = :academic_degree, `academic_title` = :academic_title, `job_place` = :job_place, `department` = :department, `job_title` = :job_title, `about` = :about");
		$params = [
		    'user_id' 			=> $user_id,
		    'phone' 			=> $phone,
		    'academic_degree'	=> $academic_degree,
		    'academic_title' 	=> $academic_title,
		    'job_place' 		=> $job_place,
		    'department' 		=> $department,
		    'job_title' 		=> $job_title,
		    'about' 			=> $about,
		];
		$stmt = $dbo->prepare($query);
		$stmt->execute($params);
		// var_dump($stmt->execute($params)); die;
        $_SESSION['user_info'] = [
            "user_id" 				=> $user_id,
            "phone" 				=> $phone,
            "full_academic_degree"	=> $academic_degree,
            "academic_title" 		=> $academic_title,
            "job_place" 			=> $job_place,
            "department" 			=> $department,
            "job_title" 			=> $job_title,
            "about" 				=> $about,
            "academic_degree_title" => $academic_degree_title,
            "academic_degree" 		=> $academic_degree,
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
		header('Location: add_user_info.php');
		die;
	}
}