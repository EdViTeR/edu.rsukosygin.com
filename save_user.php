<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';

$first_name 		= htmlspecialchars($_POST['first_name']);
$name 				= htmlspecialchars($_POST['name']);
$last_name 			= htmlspecialchars($_POST['last_name']);
$email 				= htmlspecialchars($_POST['email']);
$password 			= htmlspecialchars($_POST['password']);
$repeat_password 	= htmlspecialchars($_POST['repeat_password']);
$role 				= 4;


function debug($data) {
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

$labels = [
	'email' => 'Email',
	'password' => 'Пароль',
	'name' => 'Имя',
	'first_name' => 'Фамилия',
	'last_name' => 'Отчество',
];


$rules = [
	'required' => ['first_name', 'name', 'email', 'password', 'repeat_password'],
	'email' => ['email'],
	'lengthMin' => [
		['password', 8],
		['name', 2],
		['first_name', 2],
	],
    'regex' => [
        ['first_name', '/^[а-яА-ЯёЁ]{1,20}$/u'],
        ['name', '/^[а-яА-ЯёЁ]{1,20}$/u'],
        ['last_name', '/^[а-яА-ЯёЁ]{1,20}$/u'],
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
		$user_data = user($dbo, $email);
		if (!empty($user_data)) {
			$_SESSION['repeat_email'] = 'Данный Email уже зарегистрирован';
			header('Location: sign_up.php');
			die;
		}
		$query = ("INSERT INTO `teacher` SET `email` = :email, `name` = :name, `first_name` = :first_name, `last_name` = :last_name, `password` = :password, `role` = :role");
		$params = [
		    'email' 		=> $email,
		    'name' 			=> $name,
		    'first_name' 	=> $first_name,
		    'last_name' 	=> $last_name,
		    'password' 		=> $password,
		    'role' 			=> $role,
		];
		// var_dump($params); die;
		$stmt = $dbo->prepare($query);
		$stmt->execute($params);
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