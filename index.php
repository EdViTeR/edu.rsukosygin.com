<?
//проверка
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
				<a class="nav-link my-btn" href="#" aria-current="page">Главная</a>
			</li>
			<li class="nav-item">
				<a class="nav-link my-btn" href="#">Курсы</a>
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
		<div class="box">
			<h2>Онлайн-образование</h2>
			<h3>Избранные события, мероприятия и образовательные проекты университета в одном месте и в удобном формате</h3>
			<div class="banner">
				<a class="banner__item" href="courses.php">
					<img class="banner__avatar" src="images/index_img/course__card__icon.svg" alt="">
					<div class="banner__head">
						<h4>Онлайн-курсы</h4>
						<p>Новые онлайн-курсы, разработанные преподавателями РГУ им. А.Н. Косыгина</p>
					</div>
					<img class="banner__back" src="img\book.jpg" alt="">
				</a>
				<a class="banner__item" href="news.php">
					<img class="banner__avatar" src="images/index_img/card__news.png" alt="">
					<div class="banner__head">
						<h4>Новости</h4>
						<p>Самые актуальные новости об онлайн-образовании нашего университета</p>
					</div>
					<img class="banner__back" src="img\news.jpg" alt="">
				</a>
			</div>
		</div>
		<div class="box">
			<img class="index__photo" src="images/index_img/index__photo__last.svg" alt="">
		</div>
		<div class="box">
			<h2>Новости</h2>
			<h3></h3>
			<div class="slider-news">
				<div class="slider-news__header">
					<p>Центр развития электронных образовательных ресурсов РГУ им. А.Н. Косыгина</p>
				</div>
				<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
					<!-- Indicators/dots -->
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1" class="active" aria-current="true"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
					</div>
					<!-- The slideshow/carousel -->
					<div class="carousel-inner">
						<a href="item.php?id=8" class="carousel-item active">
							<img src="images\news\news_photo\news__photo1.svg" alt="Los Angeles" class="d-block" style="width: 100%">
							<div class="slider-news__footer">
								<div class="slider-news__date">
									<span>27 июня 2023<span>
								</div>
								<div class="slider-news__title">
									<h5>Новая платформа онлайн-курсов РГУ им. А.Н. Косыгина<h5>
								</div>
							</div>
						</a>
						<a href="item.php?id=7" class="carousel-item">
							<img src="images\news\news_photo\news__photo5.svg" alt="Chicago" class="d-block" style="width: 100%">
							<div class="slider-news__footer">
								<div class="slider-news__date">
									<span>10 февраля 2023<span>
								</div>
								<div class="slider-news__title">
									<h5>Регистрация на онлайн-курсы<h5>
								</div>
							</div>
						</a>
						<a href="item.php?id=5" class="carousel-item">
							<img src="images\news\news_photo\news__photo5.svg" alt="New York" class="d-block" style="width: 100%">
							<div class="slider-news__footer">
								<div class="slider-news__date">
									<span>14 апреля 2022<span>
								</div>
								<div class="slider-news__title">
									<h5>Запись на онлайн-курсы<h5>
								</div>
							</div>
						</a>
						<a href="item.php?id=6" class="carousel-item">
							<img src="images\news\news_photo\news__photo5.svg" alt="Chicago" class="d-block" style="width: 100%">
							<div class="slider-news__footer">
								<div class="slider-news__date">
									<span>16 мая 2022<span>
								</div>
								<div class="slider-news__title">
									<h5>Регистрация на онлайн-курсы завершилась<h5>
								</div>
							</div>
						</a>
						<a href="item.php?id=1" class="carousel-item">
							<img src="images\news\news_photo\news__photo5.svg" alt="Chicago" class="d-block" style="width: 100%">
							<div class="slider-news__footer">
								<div class="slider-news__date">
									<span>14 апреля 2022<span>
								</div>
								<div class="slider-news__title">
									<h5>Платформа онлайн-курсов<h5>
								</div>
							</div>
						</a>
					</div>
					<!-- Left and right controls/icons -->
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
						<span class="carousel-control-next-icon"></span>
					</button>
				</div>
			</div>
			<button class="btn my-btn my-btn-primary">Читать все новости</button>
		</div>
		<div class="box">
			<h2>Обратная связь</h2>
			<h3>Если у Вас есть вопросы, используйте эту форму для отправки нам сообщения. Мы ответим в ближайшее время</h3>
			<form class="feedback" method="POST" action="feedback.php">
				<div class="mb-3">
					<input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Константин">
					<small id="helpId" class="form-text text-muted">Ваше Имя</small>
				</div>
				<div class="mb-3">
					<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="mail@rguk.ru">
					<small id="emailHelpId" class="form-text text-muted">Ваша электронная почта</small>
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Введите Ваше сообщение:</label>
					<textarea class="form-control" name="message" id="message" rows="3"></textarea>
				</div>
				<button type="submit" class="btn my-btn my-btn-primary" href="index.php">Отправить</button>
			</form>
		</div>
		<div class="box">
			<h2>Контакты</h2>
			<p>Центр развития электронных образовательных ресурсов РГУ им. А.Н. Косыгина</p>
			<span>8 800 80 00 доб. 1619</span>
			<span>Москва, Малая Калужская ул., д. 1, каб. 1448 </span>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2247.2213113075927!2d37.59818307740528!3d55.71990599452383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54b728c701631%3A0x9640f31546b08960!2z0JzQsNC70LDRjyDQmtCw0LvRg9C20YHQutCw0Y8g0YPQuy4sIDEsINCc0L7RgdC60LLQsCwgMTE5MDcx!5e0!3m2!1sru!2sru!4v1683516642741!5m2!1sru!2sru" width="1200" height="512" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</main>
	<footer class="content f-bottom">
		<div class="f-box">
			<div class="f-box__item">
				<img  src="svg\logotype-invers.svg" alt="">
			</div>
			
			<div class="f-box__item">
				<p>119071, Москва<br>ул. Малая Калужская, 1</p>
				<p>&#169 2023 ФГБОУ ВО РГУ им. А.Н. Косыгина (Технологии. Дизайн. Искусство)</p>
				<p>Почта:<br>reor@rguk.ru</p>
			</div>
		</div>
	</footer>

	<!-- 
	<?php
	include('footer.php');
	?> -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>