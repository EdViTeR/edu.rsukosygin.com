<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'database/connect_db.php';

$firstName 			= htmlspecialchars($_POST['firstName']);
$name 				= htmlspecialchars($_POST['name']);
$lastName 			= htmlspecialchars($_POST['lastName']);
$email 				= htmlspecialchars($_POST['email']);
$password 			= htmlspecialchars($_POST['password']);
$repeat_password 	= htmlspecialchars($_POST['repeat_password']);
$role 				= htmlspecialchars($_POST['role']);


function debug($data) {
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

$labels = [
	'email' => 'Email',
	'password' => 'Пароль',
	'name' => 'Имя',
	'firstName' => 'Фамилия',
	'lastName' => 'Отчество',
];


$rules = [
	'required' => ['firstName', 'name', 'email', 'password', 'repeat_password'],
	'email' => ['email'],
	'lengthMin' => [
		['password', 8],
		['name', 2],
		['firstName', 2],
	],
    'regex' => [
        ['firstName', '/^[а-яА-ЯёЁ]{1,20}$/u'],
        ['name', '/^[а-яА-ЯёЁ]{1,20}$/u'],
        ['lastName', '/^[а-яА-ЯёЁ]{1,20}$/u'],
    ],
    'equals' => [
        ['password', 'repeat_password'],
    ],
    'contains' => [
        ['email', 'rguk.ru'],
    ]
];

if (!empty($_POST)) {
	\Valitron\Validator::langDir('vendor/lang');
	\Valitron\Validator::lang('ru');
	$v = new Valitron\Validator($_POST);
	$v->labels($labels);
	$v->rules($rules);
	if ($v->validate()) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$user = "SELECT * FROM teacher WHERE email='$email'";
		if (!empty($user)) {
			$_SESSION['repeat_email'] = 'Данный Email уже зарегистрирован';
			header('Location: sign_up.php');
			die;
		}
		$new_sql="INSERT INTO teacher (email, name, first_name, last_name, password, role) VALUES('$email', '$name', '$firstName', '$lastName', '$password', '$role')";
		$result = mysqli_query($link, $new_sql);
		$_SESSION['access'] = 'Вы успешно зарегистрированы';
		header('Location: index.php');
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
		header('Location: sign_up.php');
		die;
	}


}

?>