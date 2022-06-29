<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';

$id 					= $_GET['kurs_id'];
$kurs_name 				= htmlspecialchars($_POST['kurs_name']);
$description			= htmlspecialchars($_POST['description']);
$sphere 				= htmlspecialchars($_POST['sphere']);
$replacement 			= htmlspecialchars($_POST['replacement']);
$route 					= htmlspecialchars($_POST['route']);
$user_level 			= htmlspecialchars($_POST['user_level']);
$work_time 				= htmlspecialchars($_POST['work_time']);
$amount_lecture 		= htmlspecialchars($_POST['amount_lecture']);
$amount_video_lecture 	= htmlspecialchars($_POST['amount_video_lecture']);
$user_id 				= $_SESSION['user']['id'];


function debug($data) {
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

$labels = [
	'kurs_name' => 'Телефон',
	'description' => 'Ученая степень',
	'sphere' => 'Ученая степень (наука)',
	'replacement' => 'Ученое звание',
	'route' => 'Место работы',
	'user_level' => 'Должность',
	'work_time' => 'Должность',
	'amount_lecture' => 'О себе',
	'amount_video_lecture' => 'О себе',
];
$rules = [
	'required' => ['kurs_name', 'description', 'sphere', 'replacement', 'route', 'work_time', 'user_level', 'amount_lecture', 'amount_video_lecture'],
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
			'id'					=> $id,
		    'user_id' 				=> $user_id,
		    'kurs_name' 			=> $kurs_name,
		    'description'			=> $description,
		    'sphere' 				=> $sphere,
		    'replacement' 			=> $replacement,
		    'route' 				=> $route,
		    'user_level' 			=> $user_level,
		    'work_time' 			=> $work_time,
		    'amount_lecture' 		=> $amount_lecture,
		    'amount_video_lecture' 	=> $amount_video_lecture,
		];
		$sql = "UPDATE kurs_info SET user_id=:user_id, kurs_name=:kurs_name, description=:description, sphere=:sphere, replacement=:replacement, route=:route, user_level=:user_level, work_time=:work_time, user_level=:user_level, amount_lecture=:amount_lecture, amount_video_lecture=:amount_video_lecture WHERE id=:id";
		$stmt= $dbo->prepare($sql);
		$stmt->execute($data);
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
		header('Location: add_user_info.php');
		die;
	}
}