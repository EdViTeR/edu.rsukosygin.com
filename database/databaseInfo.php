<?php
require_once 'connect_db.php';


//Вытаскиваем все курсы
function kurses($link) {
	$sql = "SELECT * FROM teach_kurs";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем курс по id
function kurs($link, $id) {
	$sql = "SELECT * FROM teach_kurs WHERE id = '$id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем препода по id
function user($link, $id) {
	$sql = "SELECT * FROM teacher WHERE id = '$id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем всех преподов для админки
function users($link) {
	$sql = "SELECT * FROM teacher";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем все курсы преподавателя по его id
function teach_kurs($link, $user_id) {
	$sql = "SELECT * FROM teach_kurs WHERE head_id = '$user_id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем всех авторов курса по id курса
function authors($link, $kurs_id) {
	$sql = "SELECT * FROM author WHERE kurs_id = '$kurs_id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем все темы курса по id курса
function themes($link, $kurs_id) {
	$sql = "SELECT * FROM themes WHERE kurs_id = '$kurs_id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем 1 тему курса по id темы и id курса
function theme($link, $kurs_id, $theme_id) {
	$sql = "SELECT * FROM themes WHERE kurs_id = '$kurs_id' AND id = '$theme_id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем всю удаленную информацию
function deleted($link) {
	$sql = "SELECT * FROM deleted";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем конкретную удаленную информацию по id преподавателя
function deletedTeacher($link, $id) {
	$sql = "SELECT * FROM deleted WHERE id = '$id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}

//Вытаскиваем презентацию по id темы
function takePresent($link, $id) {
	$sql = "SELECT present_path FROM themes WHERE id = '$id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result);
	return $data;
}