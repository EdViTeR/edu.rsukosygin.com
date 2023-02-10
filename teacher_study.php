<?php
session_start();
require_once 'database/databaseInfo.php';
$teacher_study = teacher_study($dbo);
$q = 1;
$w = 1;
$e = 1;
$r = 1;
$t = 1;
$y = 1;
$u = 1;
$i = 1;
foreach ($teacher_study as $key => $value) {
    switch ($value['date']) {
        case '28.02 | 10:50':
            $q--;
            break;
        case '28.02 | 12:25':
            $w--;
            break;
        case '02.03 | 10:50':
            $e--;
            break;
        case '02.03 | 12:25':
            $r--;
            break;
        case '03.03 | 10:50':
            $t--;
            break;
        case '03.03 | 12:25':
            $y--;
            break;
        case '09.03 | 10:50':
            $u--;
            break;
        case '09.03 | 12:25':
            $i--;
            break;
        
        default:
            // code...
            break;
    }
}


?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Регистрация</title>
        <link rel="stylesheet" href="style.css">
        <link type="image/x-icon" href="images/favicon.ico" rel="shortcut icon">
        <link type="Image/x-icon" href="images/favicon.ico" rel="icon">
    </head>
    <body class="body-home">

        <!-- Шапка -->
        <div class="container pt-4">
            <header class="pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="../images/rsu_logo.svg" alt="" width="200"></a>
                </a>
            </header>
        </div>
        <!-- Контент -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-3">Регистрация на практические занятия по работе в удаленном кабинете</h4>
                    <hr><br>
                    <form method="POST" action="save_teacher_study.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label for="first_name" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введите фамилию" value="" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="last_name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" value="" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="last_name" class="form-label">Отчество</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введите отчество" value="">
                            </div><br></br><br></br><hr>
                            <h4 class="mb-3">Выберите дату занятия (продолжительность занятия - 1 час 20 минут)</h4>
                            <br></br>
							<div class="form_radio_btn">
                                <?php if ($q > 0): ?>
								    <input id="radio-1" type="radio" name="radio" value="1" checked>
								    <label for="radio-1">Мест: <?php echo $q;?><hr>28.02<hr>10:50<hr>Каб. 1440</label>
                                <?php endif ?>
                                <?php if ($w > 0): ?>
								    <input id="radio-2" type="radio" name="radio" value="2">
								    <label for="radio-2">Мест: <?php echo $w;?><hr>28.02<hr>12:25<hr>Каб. 1440</label>
                                <?php endif ?>
                                <?php if ($e > 0): ?>
    								<input id="radio-3" type="radio" name="radio" value="3">
    								<label for="radio-3">Мест: <?php echo $e;?><hr>02.03<hr>10:50<hr>Каб. 1440</label>
                                <?php endif ?>
                                <?php if ($r > 0): ?>
    								<input id="radio-4" type="radio" name="radio" value="4">
    								<label for="radio-4">Мест: <?php echo $r;?><hr>02.03<hr>12:25<hr>Каб. 1440</label>
                                <?php endif ?>
                            </div>
                            <div class="form_radio_btn">
                                <?php if ($t > 0): ?>
    								<input id="radio-5" type="radio" name="radio" value="5">
    								<label for="radio-5">Мест: <?php echo $t;?><hr>03.03<hr>10:50<hr>Каб. 1440</label>
                                <?php endif ?>
                                <?php if ($y > 0): ?>
    								<input id="radio-6" type="radio" name="radio" value="6">
    								<label for="radio-6">Мест: <?php echo $y;?><hr>03.03<hr>12:25<hr>Каб. 1440</label>
                                <?php endif ?>
                                <?php if ($u > 0): ?>
    								<input id="radio-7" type="radio" name="radio" value="7">
    								<label for="radio-7">Мест: <?php echo $u;?><hr>09.03<hr>10:50<hr>Каб. 1440</label>
                                <?php endif ?>
                                <?php if ($i > 0): ?>
    								<input id="radio-8" type="radio" name="radio" value="8">
    								<label for="radio-8">Мест: <?php echo $i;?><hr>09.03<hr>12:25<hr>Каб. 1440</label>
                                <?php endif ?>
							</div>
                        </div>
                        <br>
                        <?php
                            if (isset($_SESSION['errors'])) {
                                echo '<p class="message">' . $_SESSION['errors'] . '</p>';
                            }
                            if (isset($_SESSION['success'])) {
                                echo '<p class="access">' . $_SESSION['success'] . '</p>';
                            }
                            unset($_SESSION['errors']);
                            unset($_SESSION['success']);
                        ?>
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Зарегистрироваться</button>
                        <a href="logout.php" class="btn btn-outline-secondary btn-lg mt-4 me-3" type="submit">Выйти</a>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h2>Регистрация</h2>
                        <p>Внимательно проверьте все данные перед сохранением.</p>
                        <a class="btn btn-outline-primary btn-lg mt-4 me-3" href="https://docs.google.com/spreadsheets/d/1VaK4GZvl9pfcsjMMJQY1iSyB4UACMMuct2d469nxCes/edit?usp=sharing">Ссылка для просмотра записей</a>
                    </div>
                </div>
            </div>
        </div>   
        <!-- Подвал -->
        <div class="container">
            <footer class="py-3 my-4">
                <p class="text-center text-muted border-top pt-3 ">&copy; РГУ им. А.Н. Косыгина (ТЕХНОЛОГИИ.ДИЗАЙН.ИСКУССТВО)</p>
            </footer>
        </div>

    </body>
</html>
