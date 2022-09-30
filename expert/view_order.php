<?php
session_start();
include ("../database/databaseInfo.php");
$kurs_id = $_GET['kurs_id'];
$kurs = get_one_kurs_info($dbo, $kurs_id);
$head_user_id = $kurs['user_id'];
$head_user = user_data($dbo, $head_user_id);
$expert_name = $_SESSION["user"]["first_name"] . ' ' . $_SESSION["user"]["name"] .  ' ' . $_SESSION["user"]["last_name"];
$head_name = $head_user['first_name'] . ' ' . $head_user['name'] . ' ' . $head_user['last_name'];
$authors = authors($dbo, $kurs_id);
$photo = view_photo($dbo, $_SESSION['user']['id']);
if (!isset($_SESSION['presentation']) && empty($_SESSION['presentation'])) {
    $presentation = view_presentation($dbo, $kurs_id);
}
$themes = themes($dbo, $kurs_id);
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
                <a href="user.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
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
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="user.php">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $kurs['kurs_name'];?></li>
                  </ol>
                </nav>
                    <div class="col-lg-8">
                    <!-- Информация о курсе -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h4 mb-3">Курс: <?php echo $kurs['kurs_name'];?></p>
                        <hr class="text-secondary">

                        <p><strong>Руководитель:</strong><br>
                        <?php echo $head_name;?></p>

                        <!-- <p><strong>Регалии руководителя:</strong><br> -->
                        <!-- <?php echo $kurs['head_reg'];?></p> -->

                        <p><strong>Описание:</strong><br>
                        <?php echo $kurs["description"];?></p>


                        <p><strong>Соавторы:</strong><br>
                            <ol>
                                <?
                                if (!$authors) {
                                    echo "Нет добавленных соавторов";
                                } else {
                                    foreach ($authors as $key => $value) {
                                        $author = user_data($dbo, $value['user_id']);
                                        $author_name = $author['first_name'] . ' ' . $author['name'] . ' ' . $author['last_name'];
                                        $author_email = $author['email'];
                                        echo '<li>' . $author_name . '<br><small class="text-secondary">' . $author_email . '</small></li>';
                                    }
                                }
                                ?>
                            </ol>
                        </p>
                        <?php 
                            if (isset($presentation) && !empty($presentation)) {
                                echo "<p><strong>Презентация:</strong><br><br>
                                    <a class='btn btn-outline-primary mb-3 me-3' href='" . $presentation . "'>Посмотреть</a><br/>
                                </p>";
                            } else {
                                echo '<p><strong>Презентация:</strong><br></p>
                                        <p>Презентация не загружена</p>';
                            }

                        ?>
                        
                    </div>
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <h6 class="border-bottom pb-2 mb-0">Информация о разработчиках курса</h6>
                        <?  
                        $k = 0;
                        if (isset($themes) && !empty($themes)) {
                            foreach ($themes as $key => $value) {                               
                                $k++;
                                $themes_id = $value['id'];
                                $themes_name = $value['name'];
                                echo '<div class="d-flex text-muted pt-3">
                                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-gray-dark">Лекция ' . $k . '</strong>
                                                </div>
                                                <span class="d-block d-block-themes">' . $themes_name . '</span>
                                            </div>
                                        </div>
                                        
                                ';
                            }
                        } else {
                            echo "</br>Добавленных лекций нет.</br></br><a href='add_theme.php?kurs_id=" . $kurs_id . "'>Добавить лекцию</a>";
                        }?>
                        <small class="d-block text-end mt-3">
                            <a href="user.php">Назад</a>
                        </small>
                    </div>
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <h6 class="border-bottom pb-2 mb-0">Программа курса</h6>
                        <?  
                        $k = 0;
                        if (isset($themes) && !empty($themes)) {
                            foreach ($themes as $key => $value) {                               
                                $k++;
                                $themes_id = $value['id'];
                                $themes_name = $value['name'];
                                echo '<div class="d-flex text-muted pt-3">
                                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-gray-dark">Лекция ' . $k . '</strong>
                                                </div>
                                                <span class="d-block d-block-themes">' . $themes_name . '</span>
                                            </div>
                                        </div>
                                        
                                ';
                            }
                        } else {
                            echo "</br>Добавленных лекций нет.</br></br><a href='add_theme.php?kurs_id=" . $kurs_id . "'>Добавить лекцию</a>";
                        }?>
                        <small class="d-block text-end mt-3">
                            <a href="user.php">Назад</a>
                        </small>
                    </div>
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <h6 class="border-bottom pb-2 mb-0">Оценивание курса</h6><br>
                            <form method="POST" action="check_order.php?kurs_id=<? echo $kurs_id; ?>">
                            <label for="structure" type="text"  class="form-label">Проработанность структуры и готовность материала к созданию онлайн курса</label>
                            <input name="structure" min='0' max='25' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 25" value="" required="true">
                            </br>
                            <label for="podhod" class="form-label">Междисциплинарный подход при разработке и применении курса</label>
                            <input name="podhod"  min='0' max='25' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 25" value="" required="true">
                            </br>
                            <label for="purpose" class="form-label">Обоснованность целесообразности создания курса (с подтверждением на основе опросов мониторинга и т.п.)
                            </label>
                            <input name="purpose" min='0' max='20' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 20" value="" required="true">
                            </br>
                            <label for="technology" class="form-label">Используемые интерактивные технологии в курсе</label>
                            <input name="technology" min='0' max='15' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 15" value="" required="true">
                            </br>
                            <label for="health" class="form-label">Адаптация курса для лиц с ограниченными возможностями здоровья</label>
                            <input name="health" min='0' max='15' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 15" value="" required="true">
                            </br></br>
                            <button class="w-100 btn btn-outline-primary btn-lg">Отправить</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-white border rounded-3">
                        <?php
                        if (!empty($photo) & isset($photo)) {
                            echo '<img src=' . $photo . ' width="200" height="300" class="avatar">
                                <br>';
                        } else {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#CCC" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>';
                        } 
                        ?>
                        <p class="h5 mt-4 mb-4"><?php echo $expert_name?></p>
                        <p>Вы авторизировались как <strong>«Эксперт»</strong>.</p>
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
