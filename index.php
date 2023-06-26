<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index_style.css">
	<title>Онлайн-курсы</title>
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
				<a class="header__link active" href="index.php">Главная</a>
				<a class="header__link" href="courses.php">Курсы</a>
				<a class="header__link" href="news.php">Новости</a>
			</div>
			<nav class="nav__link">
				<a class="nav__link__lk" href="index_old.php">Личный кабинет</a>
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

<section class="head_all">
	<div class="head__all__info">
		<div class="head__info">
			<h1 class="head__info__title">ОНЛАЙН-ОБРАЗОВАНИЕ</h1>
		</div>
		<div class="head__info__title__text">
			<h2 class="head__info__text">Избранные события, мероприятия и образовательные проекты университета в одном месте и в удобном формате!</h2>
		</div>
		<div class="head__card">
			<a class="a__head_card" href="courses.php">
			<div class="head__card__course">
				<div class="course__head">
					<h2>Онлайн-курсы</h2>
				</div>
				<div class="course__text">
					<p>Новые онлайн-курсы, разработанные преподавателями РГУ им. А.Н. Косыгина </p>
				</div>
			</div></a>
			<a class="a__head_card" href="news.php">
			<div class="head__card__news">
				<div class="course__head">
					<h2>Новости</h2>
				</div>
				<div class="course__text">
					<p>Самые актуальные новости об <br>онлайн-образовании нашего университета </p>
				</div>
			</div></a>
		</div><br>

<!-- 		<div class="head__video__info">
			<div class="head__video__text">ОБ ОНЛАЙН-КУРСАХ</div>
			<div class="head__video">
				<video controls  poster="images/index_img/video_fon.png" width="766px" height="416px"><source src="images/index_img/index_video.mp4" type='video/ogg; codecs="theora, vorbis"'></video>
			</div>
		</div> -->
	</div>
</section>
<div class="index__photo"></div>
<section class="head_all">
	<div class="news">
		<div class="head__video__text">НОВОСТИ</div>
<!-- 		<div class="news__card">
			<div class="news__logo"></div>
			<div class="news__text">Центр развития электронных образовательнгых ресурсов</div>
			<div class="news__date">10 апреля 2023</div>
			<div class="news__img"></div>
			<div class="news__info"></div>
		</div> -->
	</div>
<div id="carouselExampleIndicators" class="carousel slide carousel__all">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    	<div class="carousel__item__head">
    		<div class="carousel__item__logo"></div>
    		<div class="carousel__item__head__all">
	    		<div class="carousel__item__company">Центр развития электронных образовательных ресурсов РГУ им. А.Н. Косыгина</div>
	    		<div class="carousel__item__date">10 апреля 2023</div>
    		</div>
    	</div>
    	<div class="card__photo"></div>
    	<div class="under__news">Новая платформа онлайн-курсов РГУ им. А.Н. Косыгина</div>
    </div>
    <div class="carousel-item">
    	<div class="carousel__item__head">
    		<div class="carousel__item__logo"></div>
    		<div class="carousel__item__head__all">
	    		<div class="carousel__item__company">Центр развития электронных образовательных ресурсов РГУ им. А.Н. Косыгина</div>
	    		<div class="carousel__item__date">10 апреля 2023</div>
    		</div>
    	</div>
    	<div class="card__photo"></div>
    	<div class="under__news">Новая платформа онлайн-курсов РГУ им. А.Н. Косыгина</div>
    </div>
    <div class="carousel-item">
    	<div class="carousel__item__head">
    		<div class="carousel__item__logo"></div>
    		<div class="carousel__item__head__all">
	    		<div class="carousel__item__company">Центр развития электронных образовательных ресурсов РГУ им. А.Н. Косыгина</div>
	    		<div class="carousel__item__date">10 апреля 2023</div>
    		</div>
    	</div>
    	<div class="card__photo"></div>
    	<div class="under__news">Новая платформа онлайн-курсов РГУ им. А.Н. Косыгина</div>
    </div>
    <div class="carousel-item">
    	<div class="carousel__item__head">
    		<div class="carousel__item__logo"></div>
    		<div class="carousel__item__head__all">
	    		<div class="carousel__item__company">Центр развития электронных образовательных ресурсов РГУ им. А.Н. Косыгина</div>
	    		<div class="carousel__item__date">10 апреля 2023</div>
    		</div>
    	</div>
    	<div class="card__photo"></div>
    	<div class="under__news">Новая платформа онлайн-курсов РГУ им. А.Н. Косыгина</div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
<section class="contacts">
	<div class="contacts__head">ОБРАТНАЯ СВЯЗЬ</div>
  <div class="row g-3 contacts__form">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-1"></div>
    <div class="col-sm-3">
      <input type="text" class="form-control text__for__contacts__input input__contacts" id="first_name" name="first_name" placeholder="Имя" value="" required>
    </div>
    <div class="col-sm-2">
      <input type="text" class="form-control text__for__contacts__input input__contacts" id="name" name="name" placeholder="Почта" value="" required>
    </div>
    <div class="col-sm-4 contacts__text">Центр развития электронных образовательных ресурсов <p>РГУ им. А.Н. Косыгина</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
   	<div class="col-5">
      <textarea type="text" class="form-control text__for__contacts__input textarea__contacts" id="email" name="email" placeholder="Сообщение" rows="3" required></textarea>
   	</div>
   	<div class="col-sm-2 contacts__number">8 800 80 00 доб. 1619<br>
   		<div class="contacts__address">
   			ул. Малая Калужская д.1 каб. 1448
   		</div>
   	</div>
		<div class="back__button__contacts">
			<a class="back__button__contacts__link" href="index.php">ОТПРАВИТЬ</a>
		</div>
  </div>
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2247.2213113075927!2d37.59818307740528!3d55.71990599452383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54b728c701631%3A0x9640f31546b08960!2z0JzQsNC70LDRjyDQmtCw0LvRg9C20YHQutCw0Y8g0YPQuy4sIDEsINCc0L7RgdC60LLQsCwgMTE5MDcx!5e0!3m2!1sru!2sru!4v1683516642741!5m2!1sru!2sru" width="1200" height="512" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</section>

<?php 
	include('footer.php');
?>
</body>
</html>