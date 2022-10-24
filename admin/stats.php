<?php
    include ("../database/databaseInfo.php");
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    $kurs = get_kurs_info($dbo);
    $users = users($dbo);
    $expert = expert($dbo, 5);
    $complete_kurs = kurses($dbo);
    $count_kurs = 0;
    $count_users = 0;
    $count_expert = 0;
    $count_complete_kurs = 0;
    foreach ($kurs as $key => $value) {
    	$count_kurs = $count_kurs + 1;
    }
    foreach ($users as $key => $value) {
    	$count_users = $count_users + 1;
    }
    foreach ($expert as $key => $value) {
    	$count_expert = $count_expert + 1;
    }
    foreach ($complete_kurs as $key => $value) {
    	$count_complete_kurs = $count_complete_kurs + 1;
    }
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
                    <!-- Статистика -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Статистика</p>
                        <hr class="text-secondary">
                        <div class="d-flex text-muted pt-3">
                        	<div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        		<div class="d-flex justify-content-between">
                        			<strong class="text-gray-dark">Зарегистрированных пользователей</strong>
                        			<b><? echo $count_users;?></b>
                        		</div>
                        	</div>
                        </div>
                        <div class="d-flex text-muted pt-3">
                        	<div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        		<div class="d-flex justify-content-between">
                        			<strong class="text-gray-dark">Количество заявок</strong>
                        			<b><? echo $count_kurs;?></b>
                        		</div>
                        	</div>
                        </div>
                        <div class="d-flex text-muted pt-3">
                        	<div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        		<div class="d-flex justify-content-between">
                        			<strong class="text-gray-dark">Зарегистрировано экспертов</strong>
                        			<b><? echo $count_expert;?></b>
                        		</div>
                        	</div>
                        </div>
                        <div class="d-flex text-muted pt-3">
                        	<div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        		<div class="d-flex justify-content-between">
                        			<strong class="text-gray-dark">Количество готовых онлайн-курсов</strong>
                        			<b><? echo $count_complete_kurs;?></b>
                        		</div>
                        	</div>
                        </div>
                        <small class="d-block text-end mt-3">
                            <a href="check_teacher.php">Назад</a>
                        </small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h3>Панель администратора</h3></br>
                        <p>Страница статистики</p>
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
