<?php
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';

$kurses = kurses_for_index($dbo);
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
				<a class="nav-link my-btn" href="#">Новости</a>
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
			<h2>Наши курсы</h2>
			<h3>Университет Косыгина активно участвует в создании и продвижении доступного и качественного образования, с использованием дистанционных технологий.</h3>
			<p class="box--size_xs">Представленные в разделе курсы относятся к дисциплинам «свободного модуля». Программы курсов разработаны ведущими преподавателями университета — экспертами в своей области.</p>
			<div class="box__cards">
				<?php
				foreach ($kurses as $key => $value) {
					$id = $value['id'];
					$img = $value['img'];
					$kurs_name = $value['name'];
					$data = $value['data'];
					echo '<a class="edu-card" href="course.php?id=' . $id . '">
						<div class="edu-card__img">
							<img src=" ' . $img . ' " alt="">
						</div>
						<div class="edu-card__header">
							<div class="edu-card__date">
								<img src="svg/icon-calendar.svg" alt="">
								<span>1.12.2023 - 25.01.2024</span>
							</div>
							<h4 class="edu-card__title">' . $kurs_name . '</h4>
							<p class="edu-card__description">' . $data . '</p>
						</div>
					</a>';
				}
				?>
			</div>
		</div>
		<div class="box"></div>
	</main>
	<?php
	include('footer.php');
	?>
</body>

</html>