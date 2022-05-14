<?php
session_start();
require_once 'vendor/autoload.php';
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