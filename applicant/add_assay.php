<?php
	session_start();
    include ("../database/databaseInfo.php");
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
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
                <div class="col-lg-8">
                    <h4 class="mb-3 ">Регистрация заявки онлайн-курса</h4>
                    <hr>
                    <h5 class="mb-3 ">Добавление анализа существующих онлайн-курсов</h5><br>
                    <form method="POST" action="save_order_assay.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="partic_ok" class="form-label">Небходходимо провести анализ существующих онлайн-курсов по тематике подаваемой заявки на национальных и зарубежных платформах онлайн-обучения и изложить в данной форме (излагается в свободной форме)</label>
                                <textarea type="text" name="partic_ok" id="partic_ok" cols="100" class="form-control" rows="10" placeholder="" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Сохранить</button>
                        <a class="btn btn-outline-secondary btn-lg mt-4" href="user.php">На главную</a>
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
