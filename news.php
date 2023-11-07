<?php
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';

$news = array_reverse(getNews($dbo));
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
		<div style="display:none">
			<h1>Онлайн курсы РГУ им. А.Н.Косыгина</h1>
		</div>
		<div class="logotype">
			<img class="logotype__icon" src="images/index_img/Logo_icon.svg">
			<img class="logotype__text" src="images/index_img/Logo_text.svg">
		</div>
		<div class="box box--size_xl">
			<h2>Новости онлайн-образования</h2>

		</div>
		
		<div class="box"></div>
	</main>

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
						<img src="images/news/news_card/news_card' . $id . '.svg">
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
	<?php
	include('footer.php');
	?>
</body>

</html>