<?php 
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';

$news = getNews($dbo);
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
				<a class="nav__link__lk" href="">Личный кабинет</a>
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
	<div class="head__all__info">
		<div class="head__info">
			<h1 class="head__info__title">НОВОСТИ УНИВЕРСИТЕТА</h1>
		</div>
	</div>
	<?php 
		$k = 0;
		foreach ($news as $key => $value) {
			$id = $value['id'];
			$news_name = $value['name'];
			if ($k == 0 || $k == 3) {
				echo '<div class="about">';
			}
			$k++;
			echo '<a class="kurs__href" href="item.php?id=' . $id . '"><div class="about__item">
					<div class="about__img">
						<img src="images/index_img/kurs1.png">
					</div>
				<div class="about__text">' . $news_name . '</div>
			</div></a>';
			if ($k == 3) {
				echo '</div>';
				$k = 0;
			}
		}

	?>
	</div>
	<div class="back__button">
		<a class="back__button__link" href="index.php">Вернуться</a>
	</div>
</section>
<footer class="footer">
	123123
</footer>
</body>
</html>