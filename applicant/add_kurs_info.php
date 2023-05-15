<?php
	session_start();
    include ("../database/databaseInfo.php");
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    $user_id = $_SESSION['user']['id'];
    $name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'];
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
                    <li class="breadcrumb-item active" aria-current="page">Добавление курса</li>
                  </ol>
                </nav>
                <div class="col-lg-8">
                    <h4 class="mb-3 ">Заполнение данных об онлайн-курсе</h4>
                    <hr>
					<h5 class="mb-3 ">Сведения об онлайн-курсе</h5><br>
                    <form method="POST" action="save_order_proect.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="kurs_name" class="form-label">Полное название курса</label>
                                <input type="text" class="form-control" id="kurs_name" name="kurs_name" placeholder="Введите название онлайн-курса" required>
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Описание курса</label>
                                <textarea type="text" name="description" id="description" cols="100" class="form-control" rows="3" placeholder="Несколько абзацев, в которых подробно раскрывается тема курса. Если тема или название курса неочевидные (например, «Комбинаторика для чайников»), нужно авторское определение просты языком, о чем этот курс." required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="lections" class="form-label">Лекции курса</label>
                                <textarea type="text" name="lections" id="lections" cols="100" class="form-control" rows="3" placeholder="Сколько лекций в курсе?
Сколько видеолекций в курсе?
Пример: 16 лекций из них 14 видеолекций" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="tasks" class="form-label">Задания</label>
                                <textarea type="text" name="tasks" id="tasks" cols="100" class="form-control" rows="5" placeholder="Сколько заданий планируется в курсе и какие. Пример:
5 тестовых заданий
2 практических задания
1 итоговый тест
" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="certificate" class="form-label">Сертификат (Какая часть курса должна быть пройдена слушателем для успешного прохождения курса)</label>
                                <textarea type="text" name="certificate" id="certificate" cols="100" class="form-control" rows="3" placeholder="Примеры:
Должны быть выполнены все задания и итоговый тест;
Должно быть выполнено 5 заданий из 6. 
" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="for_whom" class="form-label">Для кого (опишите аудиторию курса)</label>
                                <textarea type="text" name="for_whom" id="for_whom" cols="100" class="form-control" rows="5" placeholder="Курс будет полезен тем, кто:
пропустил некоторые темы и затрудняется решать тематические задачи;
готовится к олимпиаде;
студент бакалавриата по направлению химических технологий.
" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="why" class="form-label">Зачем (что получит слушатель при прохождении онлайн-курса)</label>
                                <textarea type="text" name="why" id="why" cols="100" class="form-control" rows="4" placeholder="Увидеть практическое применение математики;
Почувствовать азарт от решения задач;
Увидеть другой подход к преподаванию.
" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Сохранить</button>
                        <a class="btn btn-outline-secondary btn-lg mt-4" href="user.php">Назад</a>
                        <?php
                            if (isset($_SESSION['errors'])) {
                                echo '<p class="message">' . $_SESSION['errors'] . '</p>';
                            }
                            if (isset($_SESSION['repeat_email'])) {
                                echo '<p class="message">' . $_SESSION['repeat_email'] . '</p>';
                            }
                            unset($_SESSION['errors']);
                            unset($_SESSION['repeat_email']);
                        ?>
                    </form>
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
                        <p class="h5 mt-4 mb-4"><?php echo $name?></p>
<!--                         <?php 
                            if (!empty($_SESSION['user_info']) && isset($_SESSION['user_info'])) {
                                echo '<a href="edit_user_info.php" class="btn btn-primary mb-3 me-3" type="button">Редактировать профиль</a><br>';
                            } else {
                                echo '<a href="add_user_info.php" class="btn btn-primary mb-3 me-3" type="button">Заполнить профиль</a><br>';
                            }
                        ?>  -->
                        <p>Вы авторизировались как <strong>«Преподаватель»</strong>.</p> 
                        <!-- <p class="text-muted">Для регистрации заявки необходимо заполнить данные.</p> -->
                        <!-- <b>Перед регистрацией обязательно ознакомьтесь с <a href="example.php">документацией</a>.</b></br></br> -->
                        <!-- <a href="add_author.php" class="btn btn-primary mb-3 me-3" type="button">Добавить автора</a> -->
                        <!-- <a href="add_kurs_info.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Добавить сведения об онлайн-курсе</a> -->
                        <!-- <a href="add_assay.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Добавить онлайн-курса</a> -->
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
