<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    include ("../database/databaseInfo.php");
    $data = get_kurs_info($dbo);
    $users = users($dbo);
    $experts = expert_data($dbo);
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
                    <!-- Преподаватели -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Преподаватели</p>
                        <hr class="text-secondary">
                            <?  
                            $k = 0;
                            foreach ($users as $key => $value) {
                                $k++;
                                $name = $value['first_name'] . ' ' .$value['name'] . ' ' .$value['last_name'];
                                $email = $value['email'];
                                $user_id = $value['id'];
                                $role = $value['role'];
                                if ($role == 1) {
                                    $status = 'Преподаватель';
                                } else {
                                    $status = 'Админ';
                                }
                                $id = $key + 1;
                                if ($k <= 3) {
                                    echo '<div class="d-flex text-muted pt-3">
                                            <a href="view_teacher.php?user_id=' . $user_id . '" ><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
                                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-gray-dark">' . $name . '</strong>
                                                    <a href="edit_teacher.php?user_id=' . $user_id . '">Редактировать</a>
                                                </div>
                                                <span class="d-block">' . $email . '</span>
                                            </div>
                                        </div>';
                                }
                            }?>
                        <small class="d-block text-end mt-3">
                            <a href="all_teacher.php">Все преподаватели</a>
                        </small>
                    </div>

                    <!-- "Эксперты" -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Эксперты</p>
                        <hr class="text-secondary">
                            <?  
                            $k = 0;
                            foreach ($experts as $key => $value) {
                                $k++;
                                $name = $value['first_name'] . ' ' .$value['name'] . ' ' .$value['last_name'];
                                $email = $value['email'];
                                $user_id = $value['id'];
                                $role = $value['role'];
                                if ($role == 1) {
                                    $status = 'Преподаватель';
                                } else {
                                    $status = 'Админ';
                                }
                                $id = $key + 1;
                                if ($k <= 3) {
                                    echo '<div class="d-flex text-muted pt-3">
                                            <a href="view_teacher.php?user_id=' . $user_id . '" ><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
                                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-gray-dark">' . $name . '</strong>
                                                    <a href="edit_teacher.php?user_id=' . $user_id . '">Редактировать</a>
                                                </div>
                                                <span class="d-block">' . $email . '</span>
                                            </div>
                                        </div>';
                                }
                            }?>
                        <small class="d-block text-end mt-3">
                            <a href="all_expert.php">Все эксперты</a>
                        </small>
                    </div>

                    <!-- Онлайн-курсы -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Онлайн-курсы</p>
                        <hr class="text-secondary">
                            <?  
                            $k = 0;
                            foreach ($data as $key => $value) {
                                $k++;
                                $user_id = $value['user_id'];
                                $user_info = teacher($dbo, $user_id);
                                $user_name = $user_info['first_name'] . ' ' . $user_info['name'] . ' ' . $user_info['last_name'];
                                $kurs_id = $value['id'];
                                $kurs_name = $value['kurs_name'];
                                if ($k <= 3) {
                                    echo '<div class="d-flex text-muted pt-3">
                                        <a href="view_kurs.php?kurs_id=' . $kurs_id . '&user_id=' . $user_id . '" ><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bdy=".3em"></text></svg></a>
                                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                        <div class="d-flex justify-content-between">
                                            <strong class="text-gray-dark">' . $kurs_name . '</strong>
                                            <a href="edit_kurs_info.php?kurs_id=' . $kurs_id . '">Редактировать</a>
                                        </div>
                                            <span class="d-block">' . $user_name . '</span>
                                        </div>
                                    </div>';
                                }
                            }?>
                        <small class="d-block text-end mt-3">
                            <a href="all_kurses.php">Все курсы</a>
                        </small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h3>Панель администратора</h3></br>
                        <p>Привет, хороший человек! Здесь ты можешь почувствовать себя Богом онлайн-курсов. Не забывай есть печеньки!</p>
                        <a href="add_teacher.php" class="btn btn-primary mb-3 me-3" type="button">Добавить пользователя</a>
                        <!-- <a href="delete_info.php"  class="btn btn-outline-secondary mb-3" type="button">Архив</a> -->
                        <a href="stats.php"  class="btn btn-outline-secondary mb-3" type="button">Статистика</a>
                        <!-- <a href="rating.php"  class="btn btn-outline-secondary mb-3" type="button">Оценки</a> -->
                        <a href="check_teacher_info.php"  class="btn btn-outline-secondary mb-3" type="button">Проверка</a>
                        <a href="check_reviews.php"  class="btn btn-outline-secondary mb-3" type="button">Отзывы</a>
                        <a href="unloading.php"  class="btn btn-outline-secondary mb-3" type="button">Выгрузка</a>
                        <a href="add_kurs_index.php"  class="btn btn-outline-secondary mb-3" type="button">Создать новый курс</a>
                        <a href="add_lection_index.php"  class="btn btn-outline-secondary mb-3" type="button">Добавить лекцию</a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Подвал -->
        <div class="container">
            <footer class="py-3 my-4">
                <p class="text-center text-muted border-top pt-3 ">&copy; 2023 РГУ им. А.Н. Косыгина</p>
            </footer>
        </div>
    </body>
</html>
