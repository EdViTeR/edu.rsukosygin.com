<?php

require_once 'connect_db.php';

//сохраняем аватар пользователя
function save_user_images($dbo, $way, $id) {
	$data = [
	    'way' => $way,
	    'id' => $id,
	];
	$sql = "UPDATE teacher SET photo=:way WHERE id=:id";
	$stmt= $dbo->prepare($sql);
	$stmt->execute($data);
}

//сохраняем презентацию курса
function save_presentation($dbo, $way, $kurs_id) {
	$data = [
	    'way' => $way,
	    'kurs_id' => $kurs_id,
	];
	$sql = "INSERT INTO `presentations` SET `kurs_id` = :kurs_id, `presentation` = :way";
	$stmt= $dbo->prepare($sql);
	$stmt->execute($data);
}

//сохраняем презентацию лекции
function save_presentation_theme($dbo, $way, $kurs_id, $theme_id) {
	$data = [
	    'kurs_id' => $kurs_id,
	    'theme_id' => $theme_id,
	    'way' => $way,
	];
	$sql = "INSERT INTO `presentation_kurs` SET `kurs_id` = :kurs_id, `theme_id` = :theme_id, `way` = :way";
	$stmt= $dbo->prepare($sql);
	$stmt->execute($data);
}

//вытаскиваем фото
function view_photo($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `id` = ?");
	$stmt->execute([$id]);
	$user_data = $stmt->fetch(PDO::FETCH_LAZY);
	$way = $user_data['photo'];
	return $way;
}

//вытаскиваем презентацию
function view_presentation($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM presentations WHERE `kurs_id` = ?");
	$stmt->execute([$id]);
	$user_data = $stmt->fetch(PDO::FETCH_LAZY);
	$way = $user_data['presentation'];
	return $way;
}

//вытаскиваем все презентации курса по id
function view_presentation_kurs($dbo, $theme_id) {
	$stmt = $dbo->prepare("SELECT * FROM presentation_kurs WHERE `theme_id` = ?");
	$stmt->execute([$theme_id]);
	$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $user_data;
}

//удаление презентации лекции по id
function delete_presentation_kurs($dbo, $theme_id) {
	$sql = "DELETE FROM presentation_kurs WHERE theme_id=?";
	$stmt = $dbo->prepare($sql);
	$stmt->execute([$theme_id]);
}

//удаление презентации лекции по id
function delete_theme($dbo, $theme_id) {
	$sql = "DELETE FROM theme WHERE id=?";
	$stmt = $dbo->prepare($sql);
	$stmt->execute([$theme_id]);
}

//Вытаскиваем все курсы
function kurses($dbo) {
	$data = $dbo->query('SELECT * FROM teach_kurs')->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем все курсы для страницы курсов
function kurses_for_index($dbo) {
	$data = $dbo->query('SELECT * FROM kurses')->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем один курс для страницы курсов
function kurs_for_index($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM kurses WHERE `id` = ?");
	$stmt->execute([$id]);
	$kurs = $stmt->fetch(PDO::FETCH_ASSOC);
	return $kurs;
}

//Вытаскиваем весь рейтинг
function rating($dbo) {
	$data = $dbo->query('SELECT * FROM rating')->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function expert_rating($dbo, $expert_id)
{
	$stmt = $dbo->prepare("SELECT * FROM rating WHERE `expert_id` = ?");
	$stmt->execute([$expert_id]);
	$rating = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rating as $key => $value) {
		$kurs_id = $value['kurs_id'];
		$kurs_info[] = array_merge(kurs_data($dbo, $kurs_id), $value);
	}
	return $kurs_info;
}


//Вытаскиваем всех преподов по id для экспертов
function teacher($dbo, $user_id) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `id` = ?");
	$stmt->execute([$user_id]);
	$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем всех преподов для выгрузки в админку
function teacherAll($dbo) {
	$data = $dbo->query('SELECT * FROM teacher')->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем всех экспертов для статистики
function expert($dbo, $role) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `role` = ?");
	$stmt->execute([$role]);
	$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем препода по email для регистрации и авторизации
function user($dbo, $email) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `email` = ?");
	$stmt->execute([$email]);
	$user_data = $stmt->fetch(PDO::FETCH_LAZY);
	return $user_data;
}

//Вытаскиваем всех преподов по роли для просмотра оценок
function teacher_role($dbo, $role) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `role` = ?");
	$stmt->execute([$role]);
	$teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $teachers;
}

//Вытаскиваем препода по имени добавления автора
function teacher_name($dbo, $name) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `name` = ?");
	$stmt->execute([$name]);
	$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем препода по фамилии добавления автора
function first_name($dbo, $name) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `first_name` = ?");
	$stmt->execute([$name]);
	$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем препода по отчеству добавления автора
function last_name($dbo, $name) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `last_name` = ?");
	$stmt->execute([$name]);
	$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $user_data;
}


// Все курсы по заявкам
function get_kurs_info($dbo) {
	$data = $dbo->query('SELECT * FROM kurs_info')->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

// Все курсы по заявкам
function get_one_kurs_info($dbo, $kurs_id) {
	$stmt = $dbo->prepare("SELECT * FROM kurs_info WHERE `id` = ?");
	$stmt->execute([$kurs_id]);
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем все курсы преподавателя по id
function get_kurs($dbo, $user_id) {
	$stmt = $dbo->prepare("SELECT * FROM kurs_info WHERE `user_id` = ?");
	$stmt->execute([$user_id]);
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем все курсы преподавателя по id 2023
function get_kurs_2023($dbo, $user_id) {
	$stmt = $dbo->prepare("SELECT * FROM order_kurs_2023 WHERE `user_id` = ?");
	$stmt->execute([$user_id]);
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем курс по id
function kurs_data_2023($dbo, $kurs_id) {
	$stmt = $dbo->prepare("SELECT * FROM order_kurs_2023 WHERE `id` = ?");
	$stmt->execute([$kurs_id]);
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем курс по id для показа соавторам
function get_kurs_author($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM kurs_info WHERE `id` = ?");
	$stmt->execute([$id]);
	$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем инфу о преподе по id
function user_info($dbo, $user_id) {
	$stmt = $dbo->prepare("SELECT * FROM user_info WHERE `user_id` = ?");
	$stmt->execute([$user_id]);
	$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем инфу о преподе по id
function user_info_one($dbo, $user_id) {
	$stmt = $dbo->prepare("SELECT * FROM user_info WHERE `user_id` = ?");
	$stmt->execute([$user_id]);
	$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем препода по id для админки
function user_data($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM teacher WHERE `id` = ?");
	$stmt->execute([$id]);
	$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем пользователя по роли для админки
function expert_data($dbo) {
	$expert_data = $dbo->query("SELECT * FROM teacher WHERE `role` = 5")->fetchAll(PDO::FETCH_ASSOC);
	return $expert_data;
}

//Вытаскиваем курс по id
function kurs_data($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM kurs_info WHERE `id` = ?");
	$stmt->execute([$id]);
	$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user_data;
}


//Вытаскиваем курс по id для редактирования
function kurs_data_all($dbo, $status) {
	$stmt = $dbo->prepare("SELECT * FROM teach_kurs WHERE `status` = ?");
	$stmt->execute([$status]);
	$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем курс по id для админки
function kurs($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM teach_kurs WHERE `id` = ?");
	$stmt->execute([$id]);
	$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user_data;
}

//Вытаскиваем всех преподов для админки
function users($dbo) {
	$data = $dbo->query('SELECT * FROM teacher')->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем все отзывы
function reviews($dbo) {
	$data = $dbo->query('SELECT * FROM reviews')->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

//Вытаскиваем все курсы преподавателя по его id
function teach_kurs($dbo, $head_id) {
	$stmt = $dbo->prepare('SELECT * FROM teach_kurs WHERE `head_id` IN(?)');
	    if($stmt->execute([$head_id])) {
	        if($stmt->rowCount() > 0) {
	            while($result = $stmt->fetchObject()) {
	               $data[] = $result;
	            }
	        } else {
	            echo 'there are no result';
	        }
	    } else {
	        echo 'there error in the query';
	}
	return $data;
}

//Вытаскиваем всех авторов курса по id курса
function authors($dbo, $kurs_id) {
	$stmt = $dbo->prepare("SELECT * FROM author WHERE `kurs_id` = ?");
	$stmt->execute([$kurs_id]);
	$author_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $author_data;
}

//Вытаскиваем всех авторов
function authors_all($dbo) {
	$stmt = $dbo->prepare("SELECT * FROM author");
	$stmt->execute();
	$author_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $author_data;
}

//Вытаскиваем все лекции курса по id курса
function themes($dbo, $kurs_id) {
	$stmt = $dbo->prepare("SELECT * FROM theme WHERE `kurs_id` = ?");
	$stmt->execute([$kurs_id]);
	$author_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $author_data;
}

//Вытаскиваем одну лекцию курса по id лекции для редактирования
function themes_info($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM theme WHERE `id` = ?");
	$stmt->execute([$id]);
	$themes_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $themes_info;
}

//Вытаскиваем всех зарегистрированных зав.кафедр (временно)
function teacher_study($dbo) {
	$stmt = $dbo->query("SELECT * FROM teacher_study")->fetchAll(PDO::FETCH_ASSOC);
	return $stmt;
}

//Вытаскиваем 1 тему курса по id темы и id курса
function theme($dbo, $theme_id) {
	$stmt = $dbo->prepare('SELECT * FROM themes WHERE `id` IN(?)');
	    if($stmt->execute([$theme_id])) {
	        if($stmt->rowCount() > 0) {
	            while($result = $stmt->fetchObject()) {
	               $data[] = $result;
	            }
	        } else {
	            $a = 'нет данных';
	        }
	    } else {
	        echo 'there error in the query';
	}
	if (!empty($data) || !isset($a)) {
		return $data;
	}
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


//Вытаскиваем даты по истории
function takeDate($dbo) {
	$stmt = $dbo->query("SELECT * FROM history_date")->fetchAll(PDO::FETCH_ASSOC);
	return $stmt;
}


//Вытаскиваем даты записи по истории
function takeDateRegistry($dbo) {
	$stmt = $dbo->query("SELECT * FROM history_entry")->fetchAll(PDO::FETCH_ASSOC);
	return $stmt;
}

//удаление записи по истории
function delete_history_date($dbo, $date) {
	$sql = "DELETE FROM history_date WHERE date=?";
	$stmt = $dbo->prepare($sql);
	$stmt->execute([$date]);
}

// получаем регалии руководителя
function head_reg($dbo, $user_id) {
	$stmt = $dbo->prepare("SELECT * FROM user_info WHERE `user_id` = ?");
	$stmt->execute([$user_id]);
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

// получаем регалии руководителя
function lection_for_site($dbo, $kurs_id) {
	$stmt = $dbo->prepare("SELECT * FROM lection_for_site WHERE `kurs_id` = ?");
	$stmt->execute([$kurs_id]);
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}


// получаем все новости
function getNews($dbo) {
	$stmt = $dbo->query("SELECT * FROM news")->fetchAll(PDO::FETCH_ASSOC);
	return $stmt;
}

// получаем одну новость по id
function getNewsItem($dbo, $id) {
	$stmt = $dbo->prepare("SELECT * FROM news WHERE `id` = ?");
	$stmt->execute([$id]);
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}