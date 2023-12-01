<?php
require_once 'database/connect_db.php';
require_once 'database/databaseInfo.php';

$id = $_GET['id'];
$kurs = kurs_for_index($dbo, $id);
$head = head_reg($dbo, $kurs["head_id"]);
$user = teacher($dbo, $kurs["head_id"]);
$for_whom_all = $kurs['for_whom'];
$for_whom = explode(';', $for_whom_all);
$why_all = $kurs['why'];
$why = explode(';', $why_all);
$lections = lection_for_site($dbo, $kurs["id"]);
$head_reg = user_info_one($dbo, $kurs["head_id"]);
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
				<a class="nav-link my-btn" href="news.php">Новости</a>
			</li>
		</ul>
		<div class="user">
			<a class="my-btn my-btn-outline" href="sign_in.php">Личный кабинет</a>
			<a class="my-btn my-btn-primary" href="https://edu.rguk.ru/login/index.php">EDU</a>
		</div>
	</header>

	<main class="content">
		<!-- Блок с отступом -->
		<div class="course-header">
			<div class="course-header__wrap">
				<div class="course-header__info">
					<div>
						<!-- <div class="tag">Курс</div> -->
						<a class="tag tag_type" href="https://edu.rguk.ru/lk/free_modules.php">Записаться</a>
					</div>
					<div>
						<div class="tag tag_date">
							<img class="tag__icon" src="svg/icon-calendar_red.svg" alt="">
							<span><?php echo $kurs['time']; ?></span>
						</div>
					</div>
				</div>
				<h1 class="course-header__title"><?php echo $kurs['name']; ?></h1>
			</div>

			<!-- Здесь надо заменить картинку в шапке курса, лучше из базы! -->
			<img class="course-header__img" src="img/background.jpg" alt="">

		</div>
		<div class="course-description">
			<div class="course-description__item">
				<img class="course-description__img" src="svg/Clock.svg" alt="">
				<div class="course-description__wrap">
					<p>Объём практики:</p>
					<b>72 часа</b>
				</div>
			</div>
			<div class="course-description__item">
				<img class="course-description__img" src="svg/Profile.svg" alt="">
				<div class="course-description__wrap">
					<p>Требования:</p>
					<b>2 - 4 курс</b>
				</div>
			</div>
			<div class="course-description__item">
				<img class="course-description__img" src="svg/Award.svg" alt="">
				<div class="course-description__wrap">
					<p>Результат</p>
					<b>Сертификат</b>
				</div>
			</div>
		</div>
		<div class="course">
			<div class="course__item ">
				<h2 class="course__subtitle">о курсе</h2>
				<p class="course__text"><?php echo $kurs['data']; ?></p>
			</div>
			<div class="course__item">
				<h2 class="course__subtitle">лектор</h2>
				<div class="course__author-card">
					<div class="author-card__photo">
						<img src="<?php echo $kurs['author_photo_first']; ?>"></img>
					</div>
					<div class="author-card__name"><?php echo $kurs["author"]; ?></div>
					<div class="author-card__bio"><?php echo $kurs["author_info"]; ?></div>
				</div>
			</div>
		</div>
		<?php 
			if (isset($kurs['video']) && !empty($kurs['video'])) {
				echo '<div class="course-video"><div class="course-video__container">' . $kurs['video'] . '</div></div>';
			}
		?>
		<div class="course">
			<div class="course__item ">
				<h2 class="course__subtitle">для кого</h2>
				<div class="course__text">
					<?php
					foreach ($for_whom as $key => $value) {
						echo '<p>' . $value . '</p>';
					}
					?>
				</div>
			</div>
			<div class="course__item">
				<h2 class="course__subtitle">что получите</h2>
				<ul class="course__text">
					<?php
					foreach ($why as $key => $value) {
						echo '<li>' . $value . '</li>';
					}
					?>
				</ul>
			</div>
		</div>
		</div>
		<div class="box">
			<h2>Авторы курса</h2>
			<div class="course__wrapper">
				<div class="course__author-card author-card_box">
					<div class="author-card__photo">
						<img src="<?php echo $kurs['author_photo_second']; ?>"></img>
					</div>
					<div class="author-card__name"><?php echo $kurs["author"]; ?></div>
					<div class="author-card__bio"><?php echo $kurs["author_info"]; ?></div>
				</div>
<!-- 				<div class="course__author-card author-card_box">
					<div class="author-card__photo">
						<img src="<?php echo $kurs['author_photo_second']; ?>"></img>
					</div>
					<div class="author-card__name"><?php echo $kurs["author"]; ?></div>
					<div class="author-card__bio"><?php echo $kurs["author_info"]; ?></div>
				</div>
				<div class="course__author-card author-card_box">
					<div class="author-card__photo">
						<img src="<?php echo $kurs['author_photo_second']; ?>"></img>
					</div>
					<div class="author-card__name"><?php echo $kurs["author"]; ?></div>
					<div class="author-card__bio"><?php echo $kurs["author_info"]; ?></div>
				</div> -->
			</div>
		</div>
		<div class="box">
			<h2>Программа курса</h2>
			<p>*Курс состоит из лекционных и методических материалов, тестовых и практических заданий</p>
			<div class="course__program">
				<?php
				$k = 0;
				foreach ($lections as $key => $value) {
					$k++;
					echo '<div class="course__program-item">
					<div class="program-item__number">Лекция № ' . $k . '</div>
					<div class="program-item__name"> ' . $value["name"] . '</div>
					</div>';
				}
				?>
			</div>
				<a class="btn my-btn my-btn-primary" href="https://edu.rguk.ru/lk/free_modules.php">Записаться на курс</a>
		</div>
		<!-- Блок с отступом -->
		<div class="box"></div>
	</main>


	<!-- 	<div class="lection_button">
		<a class="lection_button_link" href="#">Все лекции</a>
	</div> -->



	<!-- 	<div class="back__button">
		<a class="back__button__link" href="https://edu.rguk.ru/lk/free_modules.php">Зарегистрироваться</a>
	</div> -->
	<!-- <section class="registration" name="registration" id="registration">
	<div class="contacts__head">Зарегистрироваться на курс</div>
  	<form method="POST" action="registration.php?kurs_id=<?php echo $id; ?>" class="row g-3 contacts__form">
  	<div class="col-sm-1"></div>
  	<div class="col-sm-1"></div>
	    <div class="col-sm-3">
	      <input type="text" class="form-control text__for__contacts__input input__contacts" id="first_name" name="name" placeholder="Имя" value="" required>
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control text__for__contacts__input input__contacts" id="name" name="email" placeholder="Почта" value="" required>
	    </div>
	    <div class="col-sm-4 contacts__text">Регистрация возможна при использовании ТОЛЬКО корпоративной почты!</div>
	    <div class="col-sm-1"></div>
	    <div class="col-sm-1"></div>
	    <div class="col-sm-1"></div>
		<div class="back__button__contacts">
			<button type="submit" class="back__button__contacts__link" href="index.php">ОТПРАВИТЬ</a>
		</div>
  </form>
</section> -->

	<!-- 
	<div class="registration__all" id="#end_reg">
		<div class="registration__text"><span class="red__text">Внимание!</span> Регистрация на онлайн-курсы временно закрыта. Следите за новостями сообщества! По всем вопросам: <a href="mailto:reor@rguk.ru">reor@rguk.ru</a></div>
	</div>
	<div class="back__button">
		<a class="back__button__link" href="courses.php">Вернуться</a>
	</div>
	</section>
	</br></br></br> -->

	<?php
	include('footer.php');
	?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>