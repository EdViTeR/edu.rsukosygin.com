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
	<title>Онлайн-курсы</title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index_style.css">
	<link type="image/x-icon" href="images/favicon.ico" rel="shortcut icon">
	<link type="Image/x-icon" href="images/favicon.ico" rel="icon">
</head>

<body>
	<header class="header">
		<ul class="nav navbar justify-content-center">
			<li class="nav-item">
				<a class="nav-link my-btn" href="index.php" aria-current="page">Главная</a>
			</li>
			<li class="nav-item">
				<a class="nav-link my-btn" href="courses.php">Курсы</a>
			</li>
			<li class="nav-item">
				<a class="nav-link my-btn my-btn_activ" href="news.php">Новости</a>
			</li>
		</ul>
		<div class="user">
			<a class="my-btn my-btn-outline" href="sign_in.php">Личный кабинет</a>
			<a class="my-btn my-btn-primary" href="https://edu.rguk.ru/login/index.php">EDU</a>
		</div>
	</header>

	<main class="content">
		<div class="news-header">
			<div class="news-header__wrap">
				<div class="news-header__info">
					<div class="news__date"><?php echo $date; ?></div>
				</div>
				<h1 class="news-header__title"><?php echo $news_item['name']; ?></h1>
			</div>
			<?php
			echo '<img class="news-header__img" src="images/news/news_photo/news__photo' . $news_item['id'] . '.svg" >';
			?>
		</div>
		<div class="box"></div>
		<div class="box news">
			<p class="news__subtitle"><?php echo $news_item['title']; ?></p>
			<p class="news__text"><?php echo $news_item['text']; ?></p>
		</div>
		<div class="box">
			<a class="my-btn my-btn-outline" href="news.php">Вернуться</a>
		</div>
		<div class="box"></div>
	</main>
	<?php
	include('footer.php');
	?>
</body>

</html>