<?php
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
session_start();
include ("../database/databaseInfo.php");
$kurs_id = $_GET['kurs_id'];
$user_id = $_SESSION['user']['id'];
$kurs = kurs_data($dbo, $kurs_id);
$head_id = $kurs['user_id'];
$head_info = teacher($dbo, $head_id);
$user_info = user_info_one($dbo, $head_id);
$username = teacher($dbo, $user_id);
$user_need_name = $username['first_name'] . ' ' . $username['name'] . ' ' . $username['last_name'];
$head_name = $head_info['first_name'] . ' ' . $head_info['name'] . ' ' . $head_info['last_name'];
$authors = authors($dbo, $kurs_id);
$head_reg = $user_info['academic_degree'] . ', ' . $user_info['academic_title'] . '</br>' . $user_info['about'];
$themes = themes($dbo, $kurs_id);
$photo = view_photo($dbo, $_SESSION['user']['id']);
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
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
                        <p class="h3 mb-3">Курс: <?php echo $kurs['kurs_name'];?></p></p>
                        <hr class="text-secondary">
                        
                        <p><strong>Полное название онлайн-курса:</strong><br>
                        <?php echo $kurs['kurs_name'];?></p>

                        <p><strong>Руководитель онлайн курса:</strong><br>
                        <?php echo $head_name;?></p>

                        <p><strong>Регалии руководителя:</strong><br>
                        <?php echo $head_reg;?></p>

                        <p><strong>Соавторы онлайн курса:</strong><br>
                            <ol>
                                <?
                                    foreach ($authors as $key => $value) {
                                        $author_info = teacher($dbo, $value['user_id']);
                                        $author_name = $author_info['first_name'] . ' ' . $author_info['name'] . ' ' . $author_info['last_name'];
                                        // echo '<li>' . $author_name . '<br><small class="text-secondary">' . $authors_reg . '</small></li>';
                                        echo '<li>' . $author_name . '<br>';
                                }
                                ?>
                            </ol>
                        </p>
                    </div>
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Лекции курса</p>
                        <hr class="text-secondary">
                        <?  
                        $k = 0;
                        if (!$themes) {
                            echo "</br>Добавленных лекций нет.</br></br><a href='add_theme.php?kurs_id=" . $kurs_id . "&user_id=" . $user_id . "'>Добавить лекцию</a>";
                        } else {     
                            foreach ($themes as $key => $value) {
                                $theme_name = $value['name'];
                                $theme_id = $value['id'];
                                $text_less = $value['text_less'];
                                if (!isset($text_less) && empty($text_less)) {
                                    $text_less = 'Информация не добавлена';
                                }
                                $k++;
                                    echo '<div class="d-flex text-muted pt-3">
                                                <a data-bs-toggle="collapse" href="#collapseExample'.$k.'" role="button" aria-expanded="false" aria-controls="collapseExample'.$k.' href="view_themes.php?kurs_id=' . $kurs_id . '&theme_id=' . $theme_id . '&user_id=' . $user_id . '"><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
                                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-gray-dark">Лекция '.$k.'</strong>
                                                    <a href="edit_theme.php?kurs_id=' . $kurs_id . '&theme_id=' . $theme_id . '">Редактировать</a>
                                                </div>
                                                <span class="d-block d-block-themes">' . $theme_name . '</span>
                                            <div class="collapse" id="collapseExample'.$k.'">
                                            </br>
                                                <div class="card card-body">
                                                    <b>Краткая информация</b>
                                                    <hr>
                                                    ' . $value['info'] . '
                                                </div></br>
                                                <div class="card card-body">
                                                    <b>Текст лекции</b>
                                                    <hr>
                                                    ' . $text_less . '
                                                </div></br>
                                                <div class="card card-body">
                                                    <b>Презентация</b>
                                                    <hr>';
                                                    $view_presentation_kurs = view_presentation_kurs($dbo, $theme_id);
                                                    foreach ($view_presentation_kurs as $key => $value) {
                                                        $presentation = $value['way'];
                                                    }
                                                    if (isset($presentation) && !empty($presentation)) {
                                                        echo "<div><a class='btn btn-outline-primary mb-3 me-3' href='" . $presentation . "'>Посмотреть</a>
                                                            <a class='btn btn-outline-danger mb-3 me-3' href='delete_presentation_kurs.php?theme_id=" . $theme_id . "&kurs_id=" . $kurs_id . "'>Удалить</a></div>";
                                                        unset($presentation);
                                                    } else {
                                                        echo '<form action="upload_presentation.php?kurs_id=' . $kurs_id . '&theme_id=' . $theme_id . '" method="post" enctype="multipart/form-data">
                                                            <input type="file" name="image"><br><br>
                                                            <button type="submit" class="btn btn-outline-primary mb-3 me-3">Загрузить</button>
                                                        </form></p>';
                                                    }
                                                echo '</div>
                                                </div>
                                            </div>
                                        </div>';
                            }
                        }?>
                        <small class="d-block text-end mt-3">
                            <a href="user.php?user_id=<? echo $user_id; ?>">Назад</a>
                        </small>
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
                        <p class="h5 mt-4 mb-4"><?php echo $user_need_name?></p>

                        <p>Вы авторизировались как <strong>«<?php echo $_SESSION['user']['user_status'];?>»</strong>.</p> 
                        <p>Вам доступны следующие дествия:</p>

                        <!-- <a href="add_kurs.php" class="btn btn-primary mb-3 me-3" type="button">Добавить информацию о курсе</a> -->
                        <a href="edit_kurs_info.php?status=<?php echo $kurs_id;?>" class="btn btn-primary mb-3 me-3" type="button">Редактировать курс</a>
                        <a href="add_theme_new.php?kurs_id=<?php echo $kurs_id ?>"  class="btn btn-outline-secondary mb-3" type="button">Добавить тему</a>
                        <!-- <a href="add_autor.php?kurs_id=<?php echo $kurs_id ?>&user_id=<?php echo $user_id;?>"  class="btn btn-outline-secondary mb-3" type="button">Добавить автора</a> -->
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
                <p class="text-center text-muted border-top pt-3 ">&copy; 2023 РГУ им. А.Н. Косыгина</p>
            </footer>
        </div>

    </body>
</html>
