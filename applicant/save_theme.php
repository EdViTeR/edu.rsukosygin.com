<?php 
session_start();
require_once '../vendor/autoload.php';
require_once '../database/connect_db.php';
require_once '../database/databaseInfo.php';

$kurs_id 	= $_GET['kurs_id'];
$name 		= $_POST['theme_name'];
$info 		= $_POST['theme_info'];

function debug($data) {
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

$labels = [
	'name' => 'Название лекции',
	'info' => 'Описание лекции',
];
$rules = [
	'required' => ['name', 'info'],
];

if (!empty($_POST)) {
	\Valitron\Validator::langDir('../vendor/lang');
	\Valitron\Validator::lang('ru');
	$v = new Valitron\Validator($_POST);
	$v->labels($labels);
	$v->rules($rules);
	var_dump($v); die;
	if ($v->validate()) {
		$data = [
			'kurs_id'	=> $kurs_id,
		    'name' 		=> $name,
		    'info' 		=> $info,
		];
		$query = ("INSERT INTO `theme` SET `kurs_id` = :kurs_id, `name` = :name, `info` = :info");
		$params = [
		    'kurs_id' 	=> $kurs_id,
		    'name' 		=> $name,
		    'info' 		=> $info,
		];
		$stmt = $dbo->prepare($query);
		var_dump($stmt); die;
		$stmt->execute($params);
		$_SESSION['access'] = 'Информация добавлена';
		header('Location: view_kurs.php?kurs_id='.$kurs_id);
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
		header('Location: view_kurs.php?kurs_id='.$kurs_id);
		die;
	}
}