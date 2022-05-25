<?php
	session_start();
	// var_dump($_SESSION); die;
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
                    <h4 class="mb-3 ">Регистрация заявки онлайн-курса</h5>
                    <hr>
					<h5 class="mb-3 ">Заполнение данных о руководителе проекта</h4><br>
                    <form method="POST" action="save_order_head.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label for="first_name" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введите фамилию" value="<?php echo $_SESSION['user']['first_name']?>" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="last_name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" value="<?php echo $_SESSION['user']['name']?>" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="last_name" class="form-label">Отчество</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введите отчество" value="<?php echo $_SESSION['user']['last_name']?>">
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email (корпоративный) <span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="you-np@edu.rguk.ru" value="<?php echo $_SESSION['user']['email']?>" required>
                            </div>
                            <div class="col-12">
                                <label for="author_reg" class="form-label">Регалии<span class="text-muted"></span></label>
                                <textarea type="text" name="author_reg"  cols="100" class="form-control" rows="3" placeholder="Укажите Ваши регалии  (ученая степень, ученое звание, прочие регалии и заслуги)" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Телефон<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+79009997788" required>
                            </div>
                            <div class="col-12">
                                <label for="functional" class="form-label">Выполняемые функции в проекте<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="functional" name="functional" placeholder="Руководитель курса, автор, разработчик..." required>
                            </div>
                            <div class="col-12">
                                <label for="partic_ok" class="form-label">Сведения об участии в выполнении подобных проектов<span class="text-muted"></span></label>
                                <textarea type="text" name="partic_ok" id="partic_ok" cols="100" class="form-control" rows="3" placeholder=" (Например, разработка ЭОР/ЭУК (ссылка на ресурс), запись видеолекций, включая вебинары, разработка модулей/тем для онлайн-курсов)" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="exp_ok" class="form-label">Опыт обучения на онлайн-курсах <span class="text-muted"></span></label>
                                <textarea type="text" name="exp_ok" id="exp_ok"  cols="100" class="form-control" rows="3" placeholder="(Название платформы, название курса, сроки обучения, ссылка на сертификат (при наличии) или формальный отзыв преподавателя курса по результатам обучения)" required></textarea>
                            </div>
                            <input type="text" class="form-control" id="role" name="role" placeholder="" value="1" style="visibility: hidden;">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#CCC" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <p class="h5 mt-4 mb-4"><?php echo $name?></p>
                        <!-- <p>Вы авторизировались как <strong>«Преподаватель»</strong>.</p>  -->
                        <p>Для регистрации заявки необходимо заполнить данные.</p></br>
                        <a href="add_author.php" class="btn btn-primary mb-3 me-3" type="button">Добавить автора</a>
                        <a href="add_kurs_info.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Добавить сведения об онлайн-курсе</a>
                        <a href="add_assay.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Добавить онлайн-курса</a>
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
