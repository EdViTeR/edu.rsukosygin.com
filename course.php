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
				<a class="header__link" href="index.php">Главная</a>
				<a class="header__link active" href="courses.php">Курсы</a>
				<a class="header__link" href="news.php">Новости</a>
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
	<div class="head__all__info">
		<div class="head__info">
			<h1 class="head__info__title"><?php echo $kurs['name']; ?></h1>
		</div>
		<div class="kurs__info">
			<div class="photo__inline">
				<img class="kurs__author__photo" src="<?php echo $kurs['author_photo_first']; ?>"></img>
			</div>
			<div class="info__inline">
				<div class="kurs__author__name"><?php echo $kurs["author"]; ?></div>
				<div class="lector">ЛЕКТОР КУРСА</div>
				<div class="author_reg"><?php echo $kurs["author_info"]; ?></div>
				<div class="laboriousness">Общая трудоемкость курса: 72 часа</div>
				<div class="kurs_button">
					<a class="kurs_button_link" href="#registration">Записаться</a>
				</div>
			</div>
			<div class="text__title">О КУРСЕ</div>
			<div class="text__kurs__info"><?php echo $kurs['data']; ?></div>
			
		</div>
	</div>
	<div class="for__kurs__video">
		<div class="video__kurs">
			<?php echo $kurs['video']; ?>
		</div>
	</div>
	<div class="for__whom__all">
		<div class="left__for__whom">
			<div class="left__for__whom__title">Для кого этот курс:</div><hr class="for__whom__hr">
			<div class="left__for__whom__text">
				<?php 
					foreach ($for_whom as $key => $value) {
						echo '<p>'. $value . '</p>';
					}
				?>
			</div>
		</div>
		<div class="right__for__whom">
			<div class="right__for__whom__title">Что вы получите:</div><hr class="for__whom__hr">
			<div class="right__for__whom__text">
				<ul>
					<?php 
						foreach ($why as $key => $value) {
							echo '<li>'. $value . '</li>';
						}
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="program__title">ПРОГРАММА КУРСА</div>
	<div class="program__subtitle">*Курс состоит из лекционных иметодических материалов, тестовых и практических заданий</div>
	<div class="all__lections">
		<?php 
		$k = 0;
		foreach ($lections as $key => $value) {
			$k++;
			echo '<div class="lection__item">
					<div class="lection__item__text">ЛЕКЦИЯ ' .$k. '. ' . $value["name"] . '</div>
					</div>
			';
		}

		?>
	</div>
<!-- 	<div class="lection_button">
		<a class="lection_button_link" href="#">Все лекции</a>
	</div> -->
	<div class="author__title">АВТОРЫ КУРСА</div>
	<div class="author__info">
		<img class="author__photo" src="<?php echo $kurs['author_photo_second']; ?>"></img>
		<div class="author__name"><?php echo $kurs["author"];?></div>
		<hr class="for__author__hr">
		<div class="author__reg"><?php echo $kurs["author_info"];?></div>
	</div><br><br><hr>
<section class="registration" name="registration" id="registration">
	<div class="contacts__head">Зарегистрироваться на курс</div>
  	<form method="POST" action="registration.php?kurs_id=<?php echo $id;?>" class="row g-3 contacts__form">
  <!-- <div class="row g-3 contacts__form"> -->
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
<!-- </section>
	<div class="registration__all">
		<div class="registration__text"><span class="red__text">Внимание!</span> Регистрация на онлайн-курсы временно закрыта. Следите за новостями сообщества! По всем вопросам: <a href="mailto:reor@rguk.ru">reor@rguk.ru</a></div>
	</div>
	<div class="back__button">
		<a class="back__button__link" href="courses.php">Вернуться</a>
	</div>
</section> -->
</br></br></br>

<?php 
	include('footer.php');
?>
</body>
</html>