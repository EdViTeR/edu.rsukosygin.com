<?php 
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';

$id = $_GET['id'];
$kurs = kurs_for_index($dbo, $id);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index_style.css">
	<title>Онлайн-курсы</title>
	<link type="image/x-icon" href="images/favicon.ico" rel="shortcut icon">
    <link type="Image/x-icon" href="images/favicon.ico" rel="icon">
</head>
<body>

<header class="header">
	<div class="container">
		<div class="header__inner">
			<div class="header__logo">
				<a class="header__link" href="index.php">Главная</a>
				<a class="header__link active" href="courses.php">Курсы</a>
				<a class="header__link" href="news.php">Новости</a>
			</div>
			<nav class="nav__link">
				<a class="nav__link__lk" href="">Личный кабинет</a>
				<a class="nav__link__edu" href="">EDU</a>
			</nav>
		</div>
	</div>
</header>

<div class="intro">
	<div class="container">
		<div class="intro__logo">
			<img class="logo__img" src="images/index_img/Logo_icon.svg">
    		<img class="logo__img__text" src="images/index_img/Logo_text.svg">
		</div>
	</div>
</div>

<section class="course_all">
	<div class="head__all__info">
		<div class="head__info">
			<h1 class="head__info__title"><?php echo $kurs['name']; ?></h1>
		</div>
		<div class="kurs__info">
			<div class="photo__inline">
				<img class="kurs__author__photo" src="photo.png"></img>
			</div>
			<div class="info__inline">
				<div class="kurs__author__name">Цинцадзе Марина Зиевна</div>
				<div class="lector">ЛЕКТОР КУРСА</div>
				<div class="author_reg">Старший преподаватель кафедры Энергоресурсоэффективных технологий, промышленной экологии и безопасности</div>
				<div class="laboriousness">Общая трудоемкость курса: 72 часа</div>
				<div class="kurs_button">
					<a class="kurs_button_link" href="#">Записаться</a>
				</div>
			</div>
			<div class="text__title">О КУРСЕ</div>
			<div class="text__kurs__info">Курс направлен на повышение экологической грамотности слушателя. Проблемы охраны окружающей среды и вопросы, связанные с ними, широко представлены в средствах массовой информации, однако вокруг этой тематики существует большое количество заблуждений. Курс также развеивает некоторые их них. Основные темы: основы экологии; загрязнение окружающей среды; традиционная и альтернативная энергетика; изменение климата; проблема твердых коммунальных отходов; методы и пути устранения проблемы отходов потребления; государственная политика и международное сотрудничество в области охраны окружающей среды.</div>
			
		</div>
	</div>
	<div class="for__kurs__video">
		<div class="video__kurs">
			<video controls poster="images/index_img/video_fon.png" width="766px" height="416px"><source src="images/index_img/index_video.mp4" type='video/ogg; codecs="theora, vorbis"'></video>
		</div>
	</div>
	<div class="for__whom__all">
		<div class="left__for__whom">
			<div class="left__for__whom__title">Для кого этот курс:</div><hr class="for__whom__hr">
			<div class="left__for__whom__text">
				<p>Курс рассчитан на студентов всех направлений подготовки;<p>
				<p>Основное направление 09.03.02;<p>
			</div>
		</div>
		<div class="right__for__whom">
			<div class="right__for__whom__title">Что вы получите:</div><hr class="for__whom__hr">
			<div class="right__for__whom__text">
				<ul>
					<li>9 лекций;</li>
					<li>Сертификат о прохождении курса и отметку в диплом о высшем образовании;</li>
					<li>Все материалы данного курса доступны для обучения</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="program__title">ПРОГРАММА КУРСА</div>
	<div class="program__subtitle">*Курс состоит из лекционных иметодических материалов, тестовых и практических заданий</div>
	<div class="all__lections">
		<a class="lection_link" href="#"><div class="lection__item">
			<div class="lection__item__text">ЛЕКЦИЯ 1. Введение в предмет экологии. Основные понятия и термины</div>
		</div></a>
		<a class="lection_link" href="#"><div class="lection__item">
			<div class="lection__item__text">ЛЕКЦИЯ 2. Введение в предмет экологии. Основные понятия и термины</div>
		</div></a>
		<a class="lection_link" href="#"><div class="lection__item">
			<div class="lection__item__text">ЛЕКЦИЯ 3. Введение в предмет экологии. Основные понятия и термины</div>
		</div></a>
	</div>
	<div class="lection_button">
		<a class="lection_button_link" href="#">Все лекции</a>
	</div>
	<div class="author__title">АВТОРЫ КУРСА</div>
</section>

<footer class="footer">
	123123
</footer>
</body>
</html>