<?php
    include ("../database/databaseInfo.php");
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>RSU Kosygin</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="emblem" src="/images/logo_admin.svg" width="400px" alt="RSU Kosygin">
                </div>
                <div class="col-md-8 order-md-first">
                </div>
            </div>
        </div>
        <div class="container-fluid page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-block">
                            <h1>Админка</h1>
                            <p>Привет, хороший человек! Здесь ты можешь почувствовать себя Богом онлайн-курсов. Не забывай есть печеньки!</p>
                        </div>
                        <div class="row">
                            <a href="check_teacher.php" class="btn btn-outline-primary me-2">Посмотреть пользователей</a><br>
                            <a href="add_teacher.php" class="btn btn-outline-primary me-2">Добавить эксперта</a><br>
                            <a href="delete_info.php" class="btn btn-outline-primary me-2">Удаленная информация</a><br>
                        </div>
                        </br></br></br>
                        <a href="../index.php" class="btn btn-outline-primary me-2">Выйти из аккаунта</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>