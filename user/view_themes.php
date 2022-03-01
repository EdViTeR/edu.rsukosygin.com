<?php
include ("../database/databaseInfo.php");
$user_id    = $_GET['user_id'];
$kurs_id    = $_GET['kurs_id'];
$theme_id   = $_GET['theme_id'];
$kurs = kurs($link, $kurs_id);
$authors = authors($link, $kurs_id);
$theme = theme($link, $kurs_id, $theme_id);
$present = takePresent($link, $theme_id);
$name = explode("/", $present[0][0]);
$presentName = $name[3];
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
                <a href="user.php?user_id=<?php echo $user_id;?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
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
                                    $quest1 = $value[6];
                                    $answ11 = $value[7];
                                    $answ12 = $value[8];
                                    $answ13 = $value[9];
                                    $answ14 = $value[10];
                                    $true1  = $value[11];
                                    $quest2 = $value[12];
                                    $answ21 = $value[13];
                                    $answ22 = $value[14];
                                    $answ23 = $value[15];
                                    $answ24 = $value[16];
                                    $true2  = $value[17];
                                    $quest3 = $value[18];
                                    $answ31 = $value[19];
                                    $answ32 = $value[20];
                                    $answ33 = $value[21];
                                    $answ34 = $value[22];
                                    $true3  = $value[23];
                                    $quest4 = $value[24];
                                    $answ41 = $value[25];
                                    $answ42 = $value[26];
                                    $answ43 = $value[27];
                                    $answ44 = $value[28];
                                    $true4  = $value[29];
                                    $quest5 = $value[30];
                                    $answ51 = $value[31];
                                    $answ52 = $value[32];
                                    $answ53 = $value[33];
                                    $answ54 = $value[34];
                                    $true5  = $value[35];
                                    switch ($true1) {
                                        case '1':
                                            $true11 = 'Правильный';
                                            break;
                                        case '2':
                                            $true12 = 'Правильный';
                                            break;
                                        case '3':
                                            $true13 = 'Правильный';
                                            break;
                                        case '4':
                                            $true14 = 'Правильный';
                                            break;
                                    }
                                    switch ($true2) {
                                        case '1':
                                            $true21 = 'Правильный';
                                            break;
                                        case '2':
                                            $true22 = 'Правильный';
                                            break;
                                        case '3':
                                            $true23 = 'Правильный';
                                            break;
                                        case '4':
                                            $true24 = 'Правильный';
                                            break;
                                    }
                                    switch ($true3) {
                                        case '1':
                                            $true31 = 'Правильный';
                                            break;
                                        case '2':
                                            $true32 = 'Правильный';
                                            break;
                                        case '3':
                                            $true33 = 'Правильный';
                                            break;
                                        case '4':
                                            $true34 = 'Правильный';
                                            break;
                                    }
                                    switch ($true4) {
                                        case '1':
                                            $true41 = 'Правильный';
                                            break;
                                        case '2':
                                            $true42 = 'Правильный';
                                            break;
                                        case '3':
                                            $true43 = 'Правильный';
                                            break;
                                        case '4':
                                            $true44 = 'Правильный';
                                            break;
                                    }
                                    switch ($true5) {
                                        case '1':
                                            $true51 = 'Правильный';
                                            break;
                                        case '2':
                                            $true52 = 'Правильный';
                                            break;
                                        case '3':
                                            $true53 = 'Правильный';
                                            break;
                                        case '4':
                                            $true54 = 'Правильный';
                                            break;
                                    }
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
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Тестирование</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">' . $quest1 . '</td>
                                        </tr>
                                        <tr>
                                            <td>Вариант ответа</td>
                                            <td>Правильный ответ</td>
                                        </tr>
                                        <tr>
                                            <td>' . $answ11 . '</td>
                                            <td>' . $true11 . '</td>
                                        </tr>
                                            <td>' . $answ12 . '</td>
                                            <td>' . $true12 . '</td>
                                        </tr>
                                            <td>' . $answ13 . '</td>
                                            <td>' . $true13 . '</td>
                                        </tr>
                                            <td>' . $answ14 . '</td>
                                            <td>' . $true14 . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">' . $quest2 . '</td>
                                        </tr>
                                        <tr>
                                            <td>Вариант ответа</td>
                                            <td>Правильный ответ</td>
                                        </tr>
                                        <tr>
                                            <td>' . $answ21 . '</td>
                                            <td>' . $true21 . '</td>
                                        </tr>
                                            <td>' . $answ22 . '</td>
                                            <td>' . $true22 . '</td>
                                        </tr>
                                            <td>' . $answ23 . '</td>
                                            <td>' . $true23 . '</td>
                                        </tr>
                                            <td>' . $answ24 . '</td>
                                            <td>' . $true24 . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">' . $quest3 . '</td>
                                        </tr>
                                        <tr>
                                            <td>Вариант ответа</td>
                                            <td>Правильный ответ</td>
                                        </tr>
                                        <tr>
                                            <td>' . $answ31 . '</td>
                                            <td>' . $true31 . '</td>
                                        </tr>
                                            <td>' . $answ32 . '</td>
                                            <td>' . $true32 . '</td>
                                        </tr>
                                            <td>' . $answ33 . '</td>
                                            <td>' . $true33 . '</td>
                                        </tr>
                                            <td>' . $answ34 . '</td>
                                            <td>' . $true34 . '</td>
                                        </tr>
                                        ';
                                        if ($quest4 != '') {
                                            echo '
                                                <tr>
                                                    <td colspan="2">' . $quest4 . '</td>
                                                </tr>
                                                <tr>
                                                    <td>Вариант ответа</td>
                                                    <td>Правильный ответ</td>
                                                </tr>
                                                <tr>
                                                    <td>' . $answ41 . '</td>
                                                    <td>' . $true41 . '</td>
                                                </tr>
                                                    <td>' . $answ42 . '</td>
                                                    <td>' . $true42 . '</td>
                                                </tr>
                                                    <td>' . $answ43 . '</td>
                                                    <td>' . $true43 . '</td>
                                                </tr>
                                                    <td>' . $answ44 . '</td>
                                                    <td>' . $true44 . '</td>
                                                </tr>';
                                        }
                                        if ($quest5 != '') {
                                            echo '
                                                <tr>
                                                    <td colspan="2">' . $quest5 . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Вариант ответа</td>
                                                        <td>Правильный ответ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>' . $answ51 . '</td>
                                                        <td>' . $true51 . '</td>
                                                    </tr>
                                                        <td>' . $answ52 . '</td>
                                                        <td>' . $true52 . '</td>
                                                    </tr>
                                                        <td>' . $answ53 . '</td>
                                                        <td>' . $true53 . '</td>
                                                    </tr>
                                                        <td>' . $answ54 . '</td>
                                                        <td>' . $true54 . '</td>
                                                </tr>
                                    ';
                                    }
                                }?> 
                                </thead>
                            </table>
                        </br></br>       
                      </div>
                    </div>
                    <div class="mb-3 text-center">
                        <?php if (isset($presentName) && !empty($presentName)) {
                            echo '<h5>К данной лекции прикреплена презентация</h5><br><b>' . $presentName;
                        }?></b></div><br>
                    <div class="mb-3 text-center">
                        <?php echo '<form enctype="multipart/form-data" action="load_present.php?theme_id=' . $theme_id . '&user_id=' . $user_id . '" method="post">'?>
                            <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="838860800" />
                            <!-- Название элемента input определяет имя в массиве $_FILES -->
                            <label for="userfile" class="h4">Прикрепить презентацию</label>
                            </br></br>
                            <input class="form-control" name="userfile" type="file" />
                        </br>
                            <input class="btn btn-outline-primary me-2" type="submit" value="Отправить файл" />
                        </form>
                    </div>
                    </br>
                    <div align="center">
                        <?php echo '<a href="view_kurs.php?user_id=' . $user_id . '&kurs_id=' . $kurs_id . '" class="btn btn-outline-primary me-2">Вернуться</a>'?>
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