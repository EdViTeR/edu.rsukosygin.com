<?php
session_start();
require_once 'database/databaseInfo.php';
$need_date = takeDateRegistry($dbo);

?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                    <h4 class="mb-3">Даты записи видеолекций курса по Истории</h4>
                    <hr><br>
                    <table class="table table-striped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr class="table-active">
                                <th>#</th>
                                <th>ФИО</th>
                                <th>Дата</th>
                                <th>Время</th>
                            </tr>
                            
                                <?php 
                                    $k=0;
                                    foreach ($need_date as $key => $value) {
                                        ++$k;
                                        $fullname = $value['first_name'] . ' ' . $value['name'] . ' ' . $value['last_name'];
                                        $time = explode("|", $value['date']);
                                        $day = $time['0'];
                                        $need_time = $time['1'];
                                        echo '<tr>
                                            <th scope="row">'. $k . '</th>
                                            <td>'. $fullname . '</td>
                                            <td>'. $day . '</td>
                                            <td>'. $need_time . '</td></tr>
                                        ';
                                    }
                                ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h2>Записи видеолекций по истории</h2>
                        <p>Внимательно проверьте все данные. В случае изменения даты или времени обращайтесь в Центр развития электронных образовательных ресурсов: <a href="mailto:reor@rguk.ru">reor@rguk.ru</a></p>
                        <a class="btn btn-outline-primary btn-lg mt-4 me-3" href="history_entry.php">Вернуться</a>
                        <a class="btn btn-outline-secondary btn-lg mt-4 me-3" href="logout.php">Главная</a>
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
