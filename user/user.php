<?php

session_start();
include ("../database/databaseInfo.php");
if (!isset($_SESSION['user'])) {
    header("Location: /");
}
$user_id = $_SESSION['user']['id'];
$name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'];
$user = user($dbo, $user_id);
$data = get_kurs($dbo, $user_id);
$authors_all = authors_all($dbo);
$_SESSION['user']['user_status'] = 'Разработчик';
foreach ($authors_all as $key => $value) {
    if ($user_id === $value['user_id']) {
        $kurs_id = $value['kurs_id'];
        $data = get_kurs_author($dbo, $kurs_id);
        $_SESSION['user']['user_status'] = 'Соавтор';
    }
}
$photo = view_photo($dbo, $_SESSION['user']['id']);
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
                <a href="" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
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
                    <!-- Преподаватели -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <h6 class="border-bottom pb-2 mb-0">Ваши курсы</h6>
                            <?  
                            $k = 0;
                            if (!$data) {
                                echo "</br><h4>У вас пока нет добавленных курсов</h4>";
                            } else {
                                foreach ($data as $key => $value) {
                                    $kurs_name = $value["kurs_name"];
                                    $kurs_id = $value["id"];
                                    $_SESSION['kurs_id'] = $kurs_id;
                                    echo '<div class="d-flex text-muted pt-3">
                                            <a href="view_kurs.php?kurs_id=' . $kurs_id . '" ><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
                                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-gray-dark">' . $kurs_name . '</strong>';
                                    $kurs = kurs_data_all($dbo, $kurs_id);
                                    if (isset($kurs) && !empty($kurs)) {
                                        echo 'Информация добавлена';
                                    } else {
                                        echo '<a href="add_kurs.php?kurs_id=' . $kurs_id . '">Добавить информацию</a>';
                                    }
                                    echo '           </div>
                                                <span class="d-block">Курс в разбработке</span>
                                            </div>
                                        </div>';
                                }
                            }?>
                    </div>
                    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23039BE5&ctz=Europe%2FMoscow&mode=WEEK&showTitle=1&showDate=1&showTabs=1&showCalendars=1&src=Y19vcWpwcDR2OHNxcTh2ajlpMm12cmlzaHBsb0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23B39DDB" style="border:solid 1px #777" width="855" height="600" frameborder="0" scrolling="no"></iframe>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-white border rounded-3">
                        <?php
                        if (!empty($photo) & isset($photo)) {
                            echo '<div class="photo_none">
                                <img src=' . $photo . ' width="200" height="300" class="avatar"></div>
                                <p class="h5 mt-4 mb-4">' . $name . '</p>
                                <p>Вы авторизировались как <strong>' . $_SESSION['user']['user_status'] . '</strong>.</p> 
                                <div class="photo_tool">
                                    <p>Изменить фото</p>
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        <input type="file" name="image"><br><br>
                                        <button type="submit" class="btn btn-outline-secondary mb-3 me-3">Загрузить</button>
                                    </form>
                                </div>  ';
                        } else {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#CCC" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                <p class="h5 mt-4 mb-4">' . $name . '</p>
                                <p>Вы авторизировались как <strong>' . $_SESSION['user']['user_status'] . '</strong>.</p> 
                                <div class="photo_tool">
                                <p>Добавьте фото</p>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="image"><br><br>
                                    <button type="submit" class="btn btn-outline-secondary mb-3 me-3">Загрузить</button>
                                </form></div>';
                        } 
                        ?>
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
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
