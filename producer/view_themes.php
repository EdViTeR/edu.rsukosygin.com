<?php
include ("../database/databaseInfo.php");
$kurs_id    = $_GET['kurs_id'];
$theme_id   = $_GET['theme_id'];
$user_id   = $_GET['user_id'];
$kurs = kurs($link, $kurs_id);
$authors = authors($link, $kurs_id);
$theme = theme($link, $kurs_id, $theme_id);
$quest1     = '';
$quest2     = '';
$quest3     = '';
$quest4     = '';
$quest5     = '';
$answ11     = '';
$answ12     = '';
$answ13     = '';
$answ14     = '';
$answ21     = '';
$answ22     = '';
$answ23     = '';
$answ24     = '';
$answ31     = '';
$answ32     = '';
$answ33     = '';
$answ34     = '';
$answ41     = '';
$answ42     = '';
$answ43     = '';
$answ44     = '';
$answ51     = '';
$answ52     = '';
$answ53     = '';
$answ54     = '';
$true11     = '';
$true12     = '';
$true13     = '';
$true14     = '';
$true21     = '';
$true22     = '';
$true23     = '';
$true24     = '';
$true31     = '';
$true32     = '';
$true33     = '';
$true34     = '';
$true41     = '';
$true42     = '';
$true43     = '';
$true44     = '';
$true51     = '';
$true52     = '';
$true53     = '';
$true54     = '';
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
                    <a href="../index.php" class="btn btn-outline-primary me-2">Выйти</a>
                </div>
            </header>
        </div>
        <div class="container-fluid page">
            <div class="container">
                <div class="container py-3">
                    <h1 align="center">Информация о теме</h1>
                    </br></br>
                    <div class="text-center">
                        </br>
                        <h2>Тексты лекций и материалы онлайн-курса</h2>
                        </br>
                        </br>
                            <? 
                            $n = 0;
                            foreach ($theme as $key => $value) {
                                $theme_name = $value[3];
                                $n++;
                                echo '<table class="table">
                                        <thead><tr>
                                        <td style="min-width: 634px;">Название лекции</td>
                                        <td style="min-width: 634px;">' . $value[3] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Краткая аннотация по теме лекции</td>
                                        <td>' . $value[4] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Текст лекции</td>
                                        <td>' . $value[5] . '</td>
                                    </tr>';
                                }?> 
                            </thead>
                        </table>
                        </br></br>       
                    </div>
                </div>
                <div align="center">
                    <?php echo '<a href="check_kurs_info.php?kurs_id=' . $kurs_id . '&user_id=' . $user_id . '" class="btn btn-outline-primary me-2">Вернуться</a>'?>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
        <!-- Подвал -->
        <div class="container">
            <footer class="py-3 my-4">
                <!-- <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                </ul> -->
                <p class="text-center text-muted border-top pt-3 ">&copy; 2022 РГУ им. А.Н. Косыгина</p>
            </footer>
        </div>

    </body>
</html>