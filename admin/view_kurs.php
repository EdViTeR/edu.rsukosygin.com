<?php
include ("../database/databaseInfo.php");
$kurs_id = $_GET['kurs_id'];
$user_id = $_GET['user_id'];
$kurs = kurs($dbo, $kurs_id);
$authors = authors($dbo, $kurs_id);
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
                <a href="check_teacher.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="../images/rsu_logo.svg" alt="" width="200"></a>
                </a>
                <div class="col-md-3 text-end">
                    <a href="../index.php" class="btn btn-outline-primary me-2">Выйти</a>
                </div>
            </header>
        </div>
        <!-- Контент -->
        <div class="container">
            <div class="row">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="check_teacher.php">Главная</a></li>
                    <li class="breadcrumb-item"><a href="all_kurses.php">Все курсы</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $kurs['short_name'];?></li>
                  </ol>
                </nav>
                    <div class="col-lg-8">
                    <!-- Информация о курсе -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3"><?php echo $kurs['short_name'];?></p>
                        <hr class="text-secondary">
                        
                        <p><strong>Полное название онлайн-курса:</strong><br>
                        <?php echo $kurs['kurs_name'];?></p>

                        <p><strong>Руководитель онлайн курса:</strong><br>
                        <?php echo $kurs['head_name'];?></p>

                        <p><strong>Регалии руководителя:</strong><br>
                        <?php echo $kurs['head_reg'];?></p>

                        <p><strong>Краткая информация о курсе:</strong><br>
                        <?php echo $kurs['kurs_short_info'];?></p>

                        <p><strong>Соавторы онлайн курса:</strong><br>
                            <ol>
                                <?
                                if (!$authors) {
                                    echo "Нет добавленных авторов";
                                } else {
                                    foreach ($authors as $key => $value) {
                                        $authors_name = $value->author_name;
                                        $authors_reg = $value->author_reg;
                                        echo '<li>' . $authors_name . '<br><small class="text-secondary">' . $authors_reg . '</small></li>';
                                    }
                                }
                                ?>
                            </ol>
                        </p>
                    </div>
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <h6 class="border-bottom pb-2 mb-0">Лекции курса</h6>
                        <?  
                        $k = 0;
                        if (!$themes) {
                            echo "</br>Добавленных лекций нет.</br></br><a href='add_theme.php?kurs_id=" . $kurs_id . "&user_id=" . $user_id . "'>Добавить лекцию</a>";
                        } else {
                            foreach ($themes as $key => $value) {
                                $k++;
                                $themes_id = $value->id;
                                $themes_name = $value->theme_name;
                                    echo '<div class="d-flex text-muted pt-3">
                                                        <a href="view_themes.php?kurs_id=' . $kurs_id . '&theme_id=' . $themes_id . '&user_id=' . $user_id . '"><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
                                                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                        <div class="d-flex justify-content-between">
                                                            <strong class="text-gray-dark">Лекция ' . $k . '</strong>
                                                            <a href="edit_theme.php?kurs_id=' . $kurs_id . '&theme_id=' . $themes_id . '&user_id=' . $user_id . '">Редактировать</a>
                                                        </div>
                                                        <span class="d-block d-block-themes">' . $themes_name . '</span>
                                                        </div>
                                                    </div>';
                            }
                        }?>
                        <small class="d-block text-end mt-3">
                            <a href="all_kurses.php">Назад</a>
                        </small>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h2>Личный кабинет</h2>
                        <p>Вы авторизировались как <strong>«Администратор»</strong>.</p> <p>Вам доступны следующие дествия:</p>
                        <a href="edit_kurs_info.php?kurs_id=<?php echo $kurs_id;?>" class="btn btn-primary mb-3 me-3" type="button">Редактировать курс</a>
                        <!-- <a href="delete_info.php"  class="btn btn-outline-secondary mb-3" type="button">Архив</a> -->
                    </div>
                </div>
            </div>
        </div>
    
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
