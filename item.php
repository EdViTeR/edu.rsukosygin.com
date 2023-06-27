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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
				<a class="nav__link__lk" href="sign_in.php">Личный кабинет</a>
				<div class="for__nav__link__edu">
					<a class="nav__link__edu" href="https://edu.rguk.ru/login/index.php">EDU</a>
				</div>
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
		<?php 
			switch ($news_item['id']) {
				case '1':
					echo '<img src="images/news/news_photo/news__photo' . $news_item['id'] . '.svg" class="news__photo"></img>';
					break;
				case '5':
					echo '<img src="images/news/news_photo/news__photo' . $news_item['id'] . '.svg" class="news__photo"></img>';
					break;
				case '6':
					echo '<img src="images/news/news_photo/news__photo' . $news_item['id'] . '.svg" class="news__photo"></img>';
					break;
				case '7':
					echo '<img src="images/news/news_photo/news__photo' . $news_item['id'] . '.svg" class="news__photo"></img>';
					break;
				case '8':
					echo '<img src="images/news/news_photo/news__photo' . $news_item['id'] . '.svg" class="news__photo"></img>';
					break;
			}
		?>
		<div class="news__header"><?php echo $news_item['name']; ?></div>
		<div class="news__date"><?php echo $date; ?></div>
		<div class="news__title"><?php echo $news_item['title']; ?></div>
		<div class="news__text"><?php echo $news_item['text']; ?></div>
	</div>
	<div class="button__link__item">
		<a class="back__button__link__item" href="news.php">Вернуться</a>
	</div>
</section>


<?php 
	include('footer.php');
?>
</body>
</html>