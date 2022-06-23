<?php
	session_start();
    include "../database/databaseInfo.php";
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    if (isset($_SESSION['search_teacher']) && !empty($_SESSION['search_teacher'])) {
        $users = $_SESSION['search_teacher'];
        $all_teacher = users($dbo);
    } else {
        $users = users($dbo);
    }
    $kurs_id = $_GET['kurs_id'];
    $user_id = $_SESSION['user']['id'];
    $name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'];
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Авторизация в личный кабинет</title>
        <link rel="stylesheet" href="../style.css">
        <link type="image/x-icon" href="../images/favicon.ico" rel="shortcut icon">
        <link type="Image/x-icon" href="../images/favicon.ico" rel="icon">
    </head>
    <body class="body-home">

        <!-- Шапка -->
        <div class="container pt-4">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
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
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item"><a href="kurses.php">Мои курсы</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Добавление соавтора</li>
                  </ol>
                </nav><hr>
                <div class="col-lg-8">
                    <h5 class="mb-3 ">Добавление соавтора к курсу</h5><br>
                    <form method="POST" action="search_teacher.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-5 mt-2">
                                <label for="first_name" class="form-label">Найти преподавателя для добавления</label>
                                <input type="text" class="form-control" id="search_teacher" name="search_teacher" placeholder="Введите имя или фамилию преподавателя" required>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary mb-3 me-3 mt-4" type="submit">Найти</button>
                                <?php  
                                    if (isset($_SESSION['search_teacher']) && !empty($_SESSION['search_teacher'])) {
                                        echo '<a class="btn btn-outline-primary mb-3 me-3 mt-4" href="add_author.php">Показать всех</a>';
                                    }
                                ?>
                            </div>
                        </div><br>
                    </form>
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Пользователи</p>
                        <hr class="text-secondary">
                            <?  
                            $k = 0;
                            foreach ($users as $key => $value) {
                                $k++;
                                $author_name = $value['first_name'] . ' ' .$value['name'] . ' ' .$value['last_name'];
                                $email = $value['email'];
                                $user_id = $value['id'];
                                $role = $value['role'];
                                if ($role == 1) {
                                    $status = 'Преподаватель';
                                } else {
                                    $status = 'Админ';
                                }
                                $id = $key + 1;
                                echo '<div class="d-flex text-muted pt-3">
                                        <a href="view_teacher.php?user_id=' . $user_id . '" ><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
                                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                            <div class="d-flex justify-content-between">
                                                <strong class="text-gray-dark">' . $author_name . '</strong>
                                                <a href="add_so_teacher.php?user_id=' . $user_id . '&kurs_id=' . $kurs_id . '">Добавить</a>
                                            </div>
                                            <span class="d-block">' . $email . '</span>
                                        </div>
                                    </div>';
                                    if (isset($_SESSION['search_teacher']) && !empty($_SESSION['search_teacher'])) {
                                        unset($_SESSION['search_teacher']);
                                    }
                            }?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-white border rounded-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#CCC" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <p class="h5 mt-4 mb-4"><?php echo $name?></p>
                        <!-- <p>Вы авторизировались как <strong>«Преподаватель»</strong>.</p>  -->
                        <p>Для регистрации заявки необходимо заполнить данные.</p></br>
                        <a href="add_author.php" class="btn btn-primary mb-3 me-3" type="button">Добавить автора</a>
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
