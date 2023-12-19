<?php
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
session_start();
require_once 'vendor/autoload.php';
if (isset($_SESSION['user'])) {
    switch ($_SESSION['user']['role']) {
        case '1':
            header("Location: user/user.php?user_id=$id"); //преподаватель
            break;
        case '2':
            header("Location: admin/check_teacher.php"); //админ
            break;
        case '3':
            header("Location: producer/user.php"); //продюссер
            break;
        case '4':
            header("Location: applicant/user.php"); //пользователь
            break;
        case '5':
            header("Location: expert/user.php"); //эксперт
            break;
    } 
}
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Авторизация в личный кабинет</title>
    <link rel="stylesheet" href="style.css">
    <link type="image/x-icon" href="images/favicon.ico" rel="shortcut icon">
    <link type="Image/x-icon" href="images/favicon.ico" rel="icon">
  </head>
  <body class="body-signin">
    <main class="form-signin">
        <form action="auth.php" method="post">
            <a href="/"><img class="mb-5" src="images/rsu_logo.svg" alt="" width="70%"></a>
            <h1 class="h3 mb-3 fw-normal">Личный кабинет</h1>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Пароль</label>
            </div>
            <button class="w-100 btn btn-primary btn-lg mt-2 me-3" type="submit">Войти</button>
        </form>
            <!-- <a href="sign_up.php" class="w-100 btn btn-outline-secondary btn-lg mt-2" type="submit">Регистрация</a> -->
        </br></br>    
            <a href='files/instruction.pdf' target="_blank" class="btn btn-outline-danger mb-3 me-3" type="button">Инструкция по подаче заявки</a>
            </br></br>
            <?php 
                if (isset($_SESSION['access'])) {
                    echo '<p class="access">' . $_SESSION['access'] . '</p>';
                } elseif (isset($_SESSION['message'])) {
                    echo '<p class="message">' . $_SESSION['message'] . '</p>';
                }
                unset($_SESSION['access']);
                unset($_SESSION['message']);
            ?>
            <p class="mt-4 mb-3 text-muted">Центр развития электронных<br>образовательных ресурсов<br>РГУ им. А.Н. Косыгина</br>
            <a href="mailto:reor@rguk.ru">reor@rguk.ru</a>
            </p>
      </main>
  </body>
</html>