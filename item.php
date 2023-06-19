<?php
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';
$id = $_GET['id'];
$news_item = getNewsItem($dbo, $id);
$result = mb_substr($news_item['date'], 0, 10);
list($year, $month, $day) = explode("-", $result);
switch ($month) {
	case '01':
		$month = 'Января';
		break;
	case '02':
		$month = 'Февраля';
		break;
	case '03':
		$month = 'Марта';
		break;
	case '04':
		$month = 'Апреля';
		break;
	case '05':
		$month = 'Мая';
		break;
	case '06':
		$month = 'Июня';
		break;
	case '07':
		$month = 'Июля';
		break;
	case '08':
		$month = 'Августа';
		break;
	case '09':
		$month = 'Сентября';
		break;
	case '10':
		$month = 'Октября';
		break;
	case '11':
		$month = 'Ноября';
		break;
	case '12':
		$month = 'Декабря';
		break;
}
$date = $day . ' ' . $month . ' ' . $year;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index_style.css">
	<title>Новости</title>
	<link type="image/x-icon" href="images/favicon.ico" rel="shortcut icon">
    <link type="Image/x-icon" href="images/favicon.ico" rel="icon">
</head>
<body>

<header class="header">
	<div class="container">
		<div class="header__inner">
			<div class="header__logo">
				<a class="header__link" href="index.php">Главная</a>
				<a class="header__link" href="courses.php">Курсы</a>
				<a class="header__link active" href="news.php">Новости</a>
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
	<div class="news__item">
		<div class="news__photo"></div>
		<div class="news__header"><?php echo $news_item['name']; ?></div>
		<div class="news__date"><?php echo $date; ?></div>
		<div class="news__title"><?php echo $news_item['title']; ?></div>
		<div class="news__text"><?php echo $news_item['text']; ?></div>
	</div>
	<div class="button__link__item">
		<a class="back__button__link__item" href="news.php">Вернуться</a>
	</div>
</section>


<footer class="footer">
	123123
</footer>
</body>
</html>