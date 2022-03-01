<?php
    include ("../database/databaseInfo.php");
    $user_id = $_GET['user_id'];
    $user = user($link, $user_id);
    foreach ($user as $key => $value) {
        $name = $value[2];
    }
    $data = teach_kurs($link, $user_id);

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
                    <a href="../index.php" class="btn btn-outline-primary me-2">Выйти</a>
                </div>
            </header>
        </div>
        <!-- Контент -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Преподаватели -->
                    <div class="mb-4 p-3 bg-body rounded shadow-sm">
                        <h6 class="border-bottom pb-2 mb-0">Ваши курсы</h6>
                            <?  
                            $k = 0;
                            if (!$data) {
                                echo "</br><h4>У вас пока нет добавленных курсов</h4>";
                            } else {
                                foreach ($data as $key => $value) {
                                    $status = $value[11];
                                    $kurs_name = $value[1];
                                    if ($status == 0) {
                                        $need_status = 'Курс в обработке';
                                    } else {
                                        $need_status = 'Курс обработан';
                                    }
                                    $kurs_id = $value[0];
                                    $id = $key + 1;
                                    echo '<div class="d-flex text-muted pt-3">
                                            <a href="view_kurs.php?user_id='.$user_id.'&kurs_id=' . $kurs_id . '" ><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
                                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-gray-dark">' . $kurs_name . '</strong>
                                                    <a href="edit_kurs_info.php?user_id=' . $user_id . '&kurs_id=' . $kurs_id . '">Редактировать</a>
                                                </div>
                                                <span class="d-block">' . $need_status . '</span>
                                            </div>
                                        </div>';
                                }
                            }?>
                        <small class="d-block text-end mt-3">
                            <!-- <a href="all_teacher.php">Все преподаватели</a> -->
                        </small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h2>Личный кабинет</h2>
                        <p>Вы авторизировались как <strong>«Преподаватель»</strong>.</p> <p>Вам доступны следующие дествия:</p>
                        <a href="add_kurs.php?user_id=<?php echo $user_id;?>" class="btn btn-primary mb-3 me-3" type="button">Добавить курс</a>
                        <!-- <a href="delete_info.php"  class="btn btn-outline-secondary mb-3" type="button">Выйти</a> -->
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
