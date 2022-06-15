<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';

$first_name 			= htmlspecialchars($_POST['first_name']);
$name 					= htmlspecialchars($_POST['name']);
$last_name 				= htmlspecialchars($_POST['last_name']);
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
// var_dump($full_academic_degree); die;

function debug($data) {
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

$labels = [
	'first_name' => 'Фамилия',
	'name' => 'Имя',
	'last_name' => 'Отчество',
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
	'required' => ['first_name', 'name', 'last_name', 'phone', 'academic_degree_title', 'academic_degree', 'academic_title', 'job_place', 'department', 'job_title', 'about'],
    // ['phone', 'match', 'pattern' => '/^(8)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Телефона, должно быть в формате 8(XXX)XXX-XX-XX'],
];

if (!empty($_POST)) {
	\Valitron\Validator::langDir('../vendor/lang');
	\Valitron\Validator::lang('ru');
	$v = new Valitron\Validator($_POST);
	$v->labels($labels);
	$v->rules($rules);
	if ($v->validate()) {
		$data = [
		    'phone' 			=> $phone,
		    'academic_degree'	=> $full_academic_degree,
		    'academic_title' 	=> $academic_title,
		    'job_place' 		=> $job_place,
		    'department' 		=> $department,
		    'job_title' 		=> $job_title,
		    'about' 			=> $about,
		    'id' 				=> $user_id,
		];
		$sql = "UPDATE user_info SET phone=:phone, academic_degree=:academic_degree, academic_title=:academic_title, job_place=:job_place, department=:department, job_title=:job_title, about=:about WHERE user_id=:id";
		$stmt= $dbo->prepare($sql);
		$stmt->execute($data);

		$info = [
		    'name' 			=> $name,
		    'first_name'	=> $first_name,
		    'last_name' 	=> $last_name,
		    'id' 			=> $user_id,
		];
		$sqli = "UPDATE teacher SET name=:name, first_name=:first_name, last_name=:last_name WHERE id=:id";
		$stmt= $dbo->prepare($sqli);
		$stmt->execute($info);

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
        $_SESSION['user'] = [
            "id" => $_SESSION['user']['id'],
            "email" => $_SESSION['user']['email'],
            "name" => $name,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "kurs_id" => $_SESSION['user']['kurs_id'],
            "role" => $_SESSION['user']['role'],
            "photo" => $_SESSION['user']['photo'],
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