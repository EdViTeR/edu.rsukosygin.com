<?php
session_start();
require_once 'database/databaseInfo.php';
$need_date = takeDate($dbo);

// foreach ($teacher_study as $key => $value) {
//     switch ($value['date']) {
//         case '03.05 | 12:00':
//             $q--;
//             break;
//         case '28.02 | 12:25':
//             $w--;
//             break;
//         case '02.03 | 10:50':
//             $e--;
//             break;
//         case '02.03 | 12:25':
//             $r--;
//             break;
//         case '03.03 | 10:50':
//             $t--;
//             break;
//         case '03.03 | 12:25':
//             $y--;
//             break;
//         case '09.03 | 10:50':
//             $u--;
//             break;
//         case '09.03 | 12:25':
//             $i--;
//             break;
        
//         default:
//             // code...
//             break;
//     }
// }


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
                    <h4 class="mb-3">Регистрация на запись видеолекций курса по Истории</h4>
                    <hr><br>
                    <form method="POST" action="save_history_entry.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label for="first_name" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введите фамилию" value="" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" value="" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="last_name" class="form-label">Отчество</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введите отчество" value="">
                            </div><br></br><br></br><hr>
                            <h4 class="mb-3">Выберите дату занятия (продолжительность занятия - 1 час 20 минут)</h4>
                            <b class="mb-3">Видеосъемка происходит в кабинете <u>1449</u></b>
                            <br></br>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Май - первая неделя</a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body back_gray">
                                    <div class="form_radio_btn">
                                        <?php 
                                        foreach ($need_date as $key => $value) {
                                            if ($value['week'] == 1 && $value['month'] == 'may') {
                                                $time = explode("|", $value['date']);
                                                $day = $time['0'];
                                                $need_time = $time['1'];
                                                echo '
                                                    <input id="' . $value['date'] . '" type="radio" name="radio" value="' . $value['date'] . '">
                                                    <label for="' . $value['date'] . '">' . $day . '<hr>' . $need_time . '</label>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Май - вторая неделя</a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body back_gray">
                                    <div class="form_radio_btn">
                                        <?php 
                                        foreach ($need_date as $key => $value) {
                                            if ($value['week'] == 2 && $value['month'] == 'may') {
                                                $time = explode("|", $value['date']);
                                                $day = $time['0'];
                                                $need_time = $time['1'];
                                                echo '
                                                    <input id="' . $value['date'] . '" type="radio" name="radio" value="' . $value['date'] . '">
                                                    <label for="' . $value['date'] . '">' . $day . '<hr>' . $need_time . '</label>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Май - третья неделя</a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body back_gray">
                                    <div class="form_radio_btn">
                                        <?php 
                                        foreach ($need_date as $key => $value) {
                                            if ($value['week'] == 3 && $value['month'] == 'may') {
                                                $time = explode("|", $value['date']);
                                                $day = $time['0'];
                                                $need_time = $time['1'];
                                                echo '
                                                    <input id="' . $value['date'] . '" type="radio" name="radio" value="' . $value['date'] . '">
                                                    <label for="' . $value['date'] . '">' . $day . '<hr>' . $need_time . '</label>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Май - четвертая неделя</a>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body back_gray">
                                    <div class="form_radio_btn">
                                        <?php 
                                        foreach ($need_date as $key => $value) {
                                            if ($value['week'] == 4 && $value['month'] == 'may') {
                                                $time = explode("|", $value['date']);
                                                $day = $time['0'];
                                                $need_time = $time['1'];
                                                echo '
                                                    <input id="' . $value['date'] . '" type="radio" name="radio" value="' . $value['date'] . '">
                                                    <label for="' . $value['date'] . '">' . $day . '<hr>' . $need_time . '</label>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0">
                                    <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Май - пятая неделя</a>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                <div class="card-body back_gray">
                                    <div class="form_radio_btn">
                                        <?php 
                                        foreach ($need_date as $key => $value) {
                                            if ($value['week'] == 5 && $value['month'] == 'may') {
                                                $time = explode("|", $value['date']);
                                                $day = $time['0'];
                                                $need_time = $time['1'];
                                                echo '
                                                    <input id="' . $value['date'] . '" type="radio" name="radio" value="' . $value['date'] . '">
                                                    <label for="' . $value['date'] . '">' . $day . '<hr>' . $need_time . '</label>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></br>
                <hr></br>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOneJun">
                                <h5 class="mb-0">
                                    <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOneJun" aria-expanded="false" aria-controls="collapseOneJun">Июнь - первая неделя</a>
                                </h5>
                            </div>
                            <div id="collapseOneJun" class="collapse" aria-labelledby="headingOneJun" data-parent="#accordion">
                                <div class="card-body back_gray">
                                    <div class="form_radio_btn">
                                        <?php 
                                        foreach ($need_date as $key => $value) {
                                            if ($value['week'] == 1 && $value['month'] == 'june') {
                                                $id = $value['date'] . 'june';
                                                $time = explode("|", $value['date']);
                                                $day = $time['0'];
                                                $need_time = $time['1'];
                                                echo '
                                                    <input id="' . $id . '" type="radio" name="radio" value="' . $value['date'] . '">
                                                    <label for="' . $id . '">' . $day . '<hr>' . $need_time . '</label>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwoJune">
                                <h5 class="mb-0">
                                    <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwoJune" aria-expanded="false" aria-controls="collapseTwoJune">Июнь - вторая неделя</a>
                                </h5>
                            </div>
                            <div id="collapseTwoJune" class="collapse" aria-labelledby="headingTwoJune" data-parent="#accordion">
                                <div class="card-body back_gray">
                                    <div class="form_radio_btn">
                                        <?php 
                                        foreach ($need_date as $key => $value) {
                                            if ($value['week'] == 2 && $value['month'] == 'june') {
                                                $id = $value['date'] . 'juner';
                                                $time = explode("|", $value['date']);
                                                $day = $time['0'];
                                                $need_time = $time['1'];
                                                echo '
                                                    <input id="' . $id . '" type="radio" name="radio" value="' . $value['date'] . '">
                                                    <label for="' . $id . '">' . $day . '<hr>' . $need_time . '</label>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
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
