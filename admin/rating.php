<?php

session_start();
include ("../database/databaseInfo.php");

$teachers = teacher_role($dbo, 4);
$rating = rating($dbo);

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
                    <!-- Оценки -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Оценки</p>
                        <hr class="text-secondary">
						<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">id курса</th>
						      <th scope="col">Проработанность</th>
						      <th scope="col">Подход</th>
						      <th scope="col">Обоснованность</th>
						      <th scope="col">Технологии</th>
						      <th scope="col">Адаптация</th>
						      <th scope="col">Общая</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?
						  		foreach ($rating as $key => $value) {
						  			$a = $value["structure"] + $value["podhod"] + $value["purpose"] + $value["technology"] + $value["health"];
						  			echo '
									    <tr>
									      <th scope="row">'. $value["kurs_id"] .'</th>
									      <td>'. $value["structure"] .'</td>
									      <td>'. $value["podhod"] .'</td>
									      <td>'. $value["purpose"] .'</td>
									      <td>'. $value["technology"] .'</td>
									      <td>'. $value["health"] .'</td>
									      <td>'. $a .'</td>
									    </tr>
						  			';
						  		}
						  	?>
						  </tbody>
						</table>
                        <small class="d-block text-end mt-3">
                            <a href="save_rating.php">Получить выгрузку</a>
                            <a href="check_teacher.php">Назад</a>
                        </small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h2>Личный кабинет</h2>
                        <p>Вы авторизировались как <strong>«Администратор»</strong>.</p> <p>Вам доступны следующие дествия:</p>
                        <a href="add_teacher.php" class="btn btn-primary mb-3 me-3" type="button">Добавить преподавателя</a>
                        <a href="delete_info.php"  class="btn btn-outline-secondary mb-3" type="button">Архив</a>
                        <a href="orders.php"  class="btn btn-outline-secondary mb-3" type="button">Заявки</a>
                        <a href="rating.php"  class="btn btn-outline-secondary mb-3" type="button">Оценки</a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Подвал -->
        <div class="container">
            <footer class="py-3 my-4">
                <p class="text-center text-muted border-top pt-3 ">&copy; 2022 РГУ им. А.Н. Косыгина</p>
            </footer>
        </div>

    </body>
</html>