<?php

session_start();
include ("../database/databaseInfo.php");

$teachers = teacher_role($dbo, 4);
$rating = rating($dbo);
$id = get_kurs_info($dbo);

foreach ($rating as $key => $value) {
    $val[] = $value['kurs_id'];
    switch ($value['kurs_id']) {
        case '16':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $a = 0;
            foreach ($kurs16 as $key => $value) {
                $a++;
                $mark16 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark16_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark16_name = $mark16_kurs['kurs_name'];
            $mark16_mark = round($mark16 / $a);
            $mark16 = 0;
            break;

        case '17':
            $kurs17 = kurs16($dbo, $value['kurs_id']);
            $b = 0;
            foreach ($kurs17 as $key => $value) {
                $b++;
                $mark17 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark17_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark17_name = $mark17_kurs['kurs_name'];
            $mark17_mark = round($mark17 / $b);
            $mark17 = 0;
            break;

        case '19':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $c = 0;
            foreach ($kurs16 as $key => $value) {
                $c++;
                $mark19 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark19_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark19_name = $mark19_kurs['kurs_name'];
            $mark19_mark = round($mark19 / $c);
            $mark19 = 0;
            break;

        case '20':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $d = 0;
            foreach ($kurs16 as $key => $value) {
                $d++;
                $mark20 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark20_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark20_name = $mark20_kurs['kurs_name'];
            $mark20_mark = round($mark20 / $d);
            $mark20 = 0;
            break;

        case '21':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $e = 0;
            foreach ($kurs16 as $key => $value) {
                $e++;
                $mark21 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark21_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark21_name = $mark21_kurs['kurs_name'];
            $mark21_mark = round($mark21 / $e);
            $mark21 = 0;
            break;

        case '22':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $f = 0;
            foreach ($kurs16 as $key => $value) {
                $f++;
                $mark22 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark22_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark22_name = $mark22_kurs['kurs_name'];
            $mark22_mark = round($mark22 / $f);
            $mark22 = 0;
            break;

        case '24':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $g = 0;
            foreach ($kurs16 as $key => $value) {
                $g++;
                $mark24 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark24_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark24_name = $mark24_kurs['kurs_name'];
            $mark24_mark = round($mark24 / $g);
            $mark24 = 0;
            break;

        case '25':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $h = 0;
            foreach ($kurs16 as $key => $value) {
                $h++;
                $mark25 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark25_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark25_name = $mark25_kurs['kurs_name'];
            $mark25_mark = round($mark25 / $h);
            $mark25 = 0;
            break;

        case '26':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $i = 0;
            foreach ($kurs16 as $key => $value) {
                $i++;
                $mark26 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark26_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark26_name = $mark26_kurs['kurs_name'];
            $mark26_mark = round($mark26 / $i);
            $mark26 = 0;
            break;

        case '27':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $j = 0;
            foreach ($kurs16 as $key => $value) {
                $j++;
                $mark27 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark27_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark27_name = $mark27_kurs['kurs_name'];
            $mark27_mark = round($mark27 / $j);
            $mark27 = 0;
            break;

        case '29':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $k = 0;
            foreach ($kurs16 as $key => $value) {
                $k++;
                $mark29 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark29_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark29_name = $mark29_kurs['kurs_name'];
            $mark29_mark = round($mark29 / $k);
            $mark29 = 0;
            break;

        case '31':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $l = 0;
            foreach ($kurs16 as $key => $value) {
                $l++;
                $mark31 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark31_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark31_name = $mark31_kurs['kurs_name'];
            $mark31_mark = round($mark31 / $l);
            $mark31 = 0;
            break;

        case '34':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $m = 0;
            foreach ($kurs16 as $key => $value) {
                $m++;
                $mark34 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark34_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark34_name = $mark34_kurs['kurs_name'];
            $mark34_mark = round($mark34 / $m);
            $mark34 = 0;
            break;

        case '35':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $n = 0;
            foreach ($kurs16 as $key => $value) {
                $n++;
                $mark35 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark35_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark35_name = $mark35_kurs['kurs_name'];
            $mark35_mark = round($mark35 / $n);
            $mark35 = 0;
            break;

        case '36':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $o = 0;
            foreach ($kurs16 as $key => $value) {
                $o++;
                $mark36 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark36_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark36_name = $mark36_kurs['kurs_name'];
            $mark36_mark = round($mark36 / $o);
            $mark36 = 0;
            break;

        case '37':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $p = 0;
            foreach ($kurs16 as $key => $value) {
                $p++;
                $mark37 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark37_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark37_name = $mark37_kurs['kurs_name'];
            $mark37_mark = round($mark37 / $p);
            $mark37 = 0;
            break;

        case '38':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $r = 0;
            foreach ($kurs16 as $key => $value) {
                $r++;
                $mark38 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark38_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark38_name = $mark38_kurs['kurs_name'];
            $mark38_mark = round($mark38 / $r);
            $mark38 = 0;
            break;

        case '40':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $t = 0;
            foreach ($kurs16 as $key => $value) {
                $t++;
                $mark40 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark40_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark40_name = $mark40_kurs['kurs_name'];
            $mark40_mark = round($mark40 / $t);
            $mark40 = 0;
            break;

        case '41':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $s = 0;
            foreach ($kurs16 as $key => $value) {
                $s++;
                $mark41 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark41_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark41_name = $mark41_kurs['kurs_name'];
            $mark41_mark = round($mark41 / $s);
            $mark41 = 0;
            break;

        case '42':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $q = 0;
            foreach ($kurs16 as $key => $value) {
                $q++;
                $mark42 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark42_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark42_name = $mark42_kurs['kurs_name'];
            $mark42_mark = round($mark42 / $q);
            $mark42 = 0;
            break;

        case '43':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $q = 0;
            foreach ($kurs16 as $key => $value) {
                $q++;
                $mark43 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark43_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark43_name = $mark43_kurs['kurs_name'];
            $mark43_mark = round($mark43 / $q);
            $mark43 = 0;
            break;

        case '44':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $u = 0;
            foreach ($kurs16 as $key => $value) {
                $u++;
                $mark44 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark44_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark44_name = $mark44_kurs['kurs_name'];
            $mark44_mark = round($mark44 / $u);
            $mark44 = 0;
            break;

        case '45':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $v = 0;
            foreach ($kurs16 as $key => $value) {
                $v++;
                $mark45 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark45_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark45_name = $mark45_kurs['kurs_name'];
            $mark45_mark = round($mark45 / $v);

            $mark45 = 0;
            break;

        case '46':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $w = 0;
            foreach ($kurs16 as $key => $value) {
                $w++;
                $mark46 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark46_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark46_name = $mark46_kurs['kurs_name'];
            $mark46_mark = round($mark46 / $w);

            $mark46 = 0;
            break;

        case '47':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $x = 0;
            foreach ($kurs16 as $key => $value) {
                $x++;
                $mark47 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark47_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark47_name = $mark47_kurs['kurs_name'];
            $mark47_mark = round($mark47 / $x);

            $mark47 = 0;
            break;

        case '48':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $y = 0;
            foreach ($kurs16 as $key => $value) {
                $y++;
                $mark48 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark48_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark48_name = $mark48_kurs['kurs_name'];
            $mark48_mark = round($mark48 / $y);

            $mark48 = 0;
            break;

        case '49':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $z = 0;
            foreach ($kurs16 as $key => $value) {
                $z++;
                $mark49 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark49_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark49_name = $mark49_kurs['kurs_name'];
            $mark49_mark = round($mark49 / $z);

            $mark49 = 0;
            break;

        case '50':
            $kurs16 = kurs16($dbo, $value['kurs_id']);
            $zz = 0;
            foreach ($kurs16 as $key => $value) {
                $zz++;
                $mark50 += $value['structure'] + $value['podhod'] + $value['purpose'] + $value['technology'] + $value['health'];
            }
            $mark50_kurs = kurs_data($dbo, $value['kurs_id']);
            $mark50_name = $mark50_kurs['kurs_name'];
            $mark50_mark = round($mark50 / $zz);

            $mark50 = 0;
            break;
        
        default:
            // code...
            break;
    }
}
$kurs_marks = [
    $mark16_name    => $mark16_mark,
    $mark17_name    => $mark17_mark,
    $mark19_name    => $mark19_mark,
    $mark20_name    => $mark20_mark,
    $mark21_name    => $mark21_mark,
    $mark22_name    => $mark22_mark,
    $mark24_name    => $mark24_mark,
    $mark25_name    => $mark25_mark,
    $mark26_name    => $mark26_mark,
    $mark27_name    => $mark27_mark,
    $mark29_name    => $mark29_mark,
    $mark31_name    => $mark31_mark,
    $mark34_name    => $mark34_mark,
    $mark35_name    => $mark35_mark,
    $mark36_name    => $mark36_mark,
    $mark37_name    => $mark37_mark,
    $mark38_name    => $mark38_mark,
    $mark40_name    => $mark40_mark,
    $mark41_name    => $mark41_mark,
    $mark42_name    => $mark42_mark,
    $mark43_name    => $mark43_mark,
    $mark44_name    => $mark44_mark,
    $mark45_name    => $mark45_mark,
    $mark46_name    => $mark46_mark,
    $mark47_name    => $mark47_mark,
    $mark48_name    => $mark48_mark,
    $mark49_name    => $mark49_mark,
    $mark50_name    => $mark50_mark,
];
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
						      <th scope="col">№</th>
						      <th scope="col">Курс</th>
						      <th scope="col">Результат</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?
                                $qwe = 0;
						  		foreach ($kurs_marks as $key => $value) {
                                    $qwe++;
						  			echo '
									    <tr>
									      <th scope="row">'. $qwe .'</th>
									      <td>'. $key .'</td>
									      <td>'. $value .'</td>
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