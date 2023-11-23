<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    include ("../database/databaseInfo.php");
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Авторизация в личный кабинет</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body class="body-home">

        <!-- Шапка -->
        <div class="container pt-4">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between pb-3 mb-4 border-bottom">
                <a href="check_teacher.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="../images/rsu_logo.svg" alt="" width="200"></a>
                </a>
                <div class="col-md-3 text-end">
                    <a href="../logout.php" class="btn btn-outline-primary me-2">Выйти</a>
                </div>
            </header>
        </div>
        <!-- Контент -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Оценки</p>
                        <hr class="text-secondary">
                        <?php 
                            $orders = get_kurs_info_2023($dbo);
							foreach ($orders as $key => $value) {
							 	$k = 0;
							 	$marks = mark_2023($dbo, $value['id']);
							 	foreach ($marks as $key => $mark) {
							    	$rating[] = $mark["actual"] + $mark["structure"] + $mark["sposob"] + $mark["adaptive"] + $mark["health"] + $mark["moneyy"] + $mark["unique"];
                                    $actual[]       = $mark["actual"];
                                    $structure[]    = $mark["structure"];
                                    $sposob[]       = $mark["sposob"];
                                    $adaptive[]     = $mark["adaptive"];
                                    $health[]       = $mark["health"];
                                    $moneyy[]       = $mark["moneyy"];
                                    $unique[]       = $mark["unique"];
							    	$k = count($rating);
							    }
								$itog       = round(array_sum($rating) / $k);
                                $actual     = round(array_sum($actual) / $k);
                                $structure  = round(array_sum($structure) / $k);
                                $sposob     = round(array_sum($sposob) / $k);
                                $adaptive   = round(array_sum($adaptive) / $k);
                                $health     = round(array_sum($health) / $k);
                                $moneyy     = round(array_sum($moneyy) / $k);
                                $unique     = round(array_sum($unique) / $k);
								echo $value['kurs_name'] . ' | ' . $itog . '</br>' . $actual . ' | ' . $structure . ' | ' . $sposob . ' | ' . $adaptive . ' | ' . $health . ' | ' . $moneyy . ' | ' . $unique . '</br>';
								unset($rating, $itog, $actual, $structure, $sposob, $adaptive, $health, $moneyy, $unique);
    						}
                        ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h3>Панель администратора</h3></br>
                        <p>Привет, хороший человек! Здесь ты можешь почувствовать себя Богом онлайн-курсов. Не забывай есть печеньки!</p>
                        <a href="add_teacher.php" class="btn btn-primary mb-3 me-3" type="button">Добавить пользователя</a>
                        <!-- <a href="delete_info.php"  class="btn btn-outline-secondary mb-3" type="button">Архив</a> -->
                        <a href="stats.php"  class="btn btn-outline-secondary mb-3" type="button">Статистика</a>
                        <!-- <a href="rating.php"  class="btn btn-outline-secondary mb-3" type="button">Оценки</a> -->
                        <a href="check_teacher_info.php"  class="btn btn-outline-secondary mb-3" type="button">Проверка</a>
                        <a href="check_reviews.php"  class="btn btn-outline-secondary mb-3" type="button">Отзывы</a>
                        <a href="unloading.php"  class="btn btn-outline-secondary mb-3" type="button">Выгрузка</a>
                        <a href="add_kurs_index.php"  class="btn btn-outline-secondary mb-3" type="button">Создать новый курс</a>
                        <a href="add_lection_index.php"  class="btn btn-outline-secondary mb-3" type="button">Добавить лекцию</a>
                        <a href="add_img_index.php"  class="btn btn-outline-secondary mb-3" type="button">Добавить фото</a>
                        <a href="check_rating.php"  class="btn btn-outline-secondary mb-3" type="button">Результаты</a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Подвал -->
        <div class="container">
            <footer class="py-3 my-4">
                <p class="text-center text-muted border-top pt-3 ">&copy; 2023 РГУ им. А.Н. Косыгина</p>
            </footer>
        </div>
    </body>
</html>
