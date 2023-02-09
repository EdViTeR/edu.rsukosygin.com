<?php

?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Регистрация</title>
        <link rel="stylesheet" href="style.css">
        <link type="image/x-icon" href="images/favicon.ico" rel="shortcut icon">
        <link type="Image/x-icon" href="images/favicon.ico" rel="icon">
    </head>
    <body class="body-home">

        <!-- Шапка -->
        <div class="container pt-4">
            <header class="pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="../images/rsu_logo.svg" alt="" width="200"></a>
                </a>
            </header>
        </div>
        <!-- Контент -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-3">Регистрация разработчика онлайн-курсов</h4>
                    <hr><br>
                    <form method="POST" action="save_teacher_study_user.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label for="first_name" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введите фамилию" value="" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="last_name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" value="" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="last_name" class="form-label">Отчество</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введите отчество" value="">
                            </div><br></br><br></br><hr>
                            <h4 class="mb-3">Выберите дату</h4>
                            <br></br>
							<div class="form_radio_btn">
								<input id="radio-1" type="radio" name="radio" value="1" checked>
								<label for="radio-1">15.02<hr>10:00<hr>1444</label>
								<input id="radio-2" type="radio" name="radio" value="2">
								<label for="radio-2">16.02<hr>10:00<hr>1444</label>
								<input id="radio-3" type="radio" name="radio" value="3">
								<label for="radio-3">17.02<hr>10:00<hr>1444</label>
								<input id="radio-4" type="radio" name="radio" value="4">
								<label for="radio-4">18.02<hr>10:00<hr>1444</label>
								<input id="radio-5" type="radio" name="radio" value="5">
								<label for="radio-5">19.02<hr>10:00<hr>1444</label>
								<input id="radio-6" type="radio" name="radio" value="6">
								<label for="radio-6">15.02<hr>10:00<hr>1444</label>
								<input id="radio-7" type="radio" name="radio" value="7">
								<label for="radio-7">16.02<hr>10:00<hr>1444</label>
								<input id="radio-8" type="radio" name="radio" value="8">
								<label for="radio-8">17.02<hr>10:00<hr>1444</label>
								<input id="radio-9" type="radio" name="radio" value="9">
								<label for="radio-9">18.02<hr>10:00<hr>1444</label>
							</div>
                        </div>
                        <br>
                        <!-- <p class="mt-4">Последние изменение: 21.01.2022 в 23:23</p> -->
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Зарегистрироваться</button>
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
                    <div class="p-5 bg-light border rounded-3">
                        <h2>Регистрация</h2>
                        <p>Внимательно проверьте все данные перед сохранением.</p>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Подвал -->
        <div class="container">
            <footer class="py-3 my-4">
                <p class="text-center text-muted border-top pt-3 ">&copy; РГУ им. А.Н. Косыгина (ТЕХНОЛОГИИ.ДИЗАЙН.ИСКУССТВО)</p>
            </footer>
        </div>

    </body>
</html>
