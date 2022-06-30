<?php
	session_start();
    include ("../database/databaseInfo.php");
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    $user_id = $_SESSION['user']['id'];
    $name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'];
    $kurs_id = $_GET['kurs_id'];
    $photo = view_photo($dbo, $_SESSION['user']['id']);
    $kurs = kurs_data($dbo, $kurs_id);
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
                    <li class="breadcrumb-item"><a href="view_kurs.php?kurs_id=<? echo $kurs_id ?>"><?php echo $kurs['kurs_name']?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Добавление лекции</li>
                  </ol>
                </nav><hr>
                <div class="col-lg-8">
                    <h4 class="mb-3 ">Добавление данных об онлайн-курсе</h4>
                    <hr>
					<h5 class="mb-3 ">Добавление лекции</h5><br>
                    <form method="POST" action="save_theme.php?kurs_id=<?php echo $kurs_id;?>" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="theme_name" class="form-label">Название лекции</label>
                                <input type="text" class="form-control" id="theme_name" name="theme_name" value="" placeholder="Введите название леции" required>
                            </div>
                            <div class="col-12">
                                <label for="theme_info" class="form-label">Краткое содержание к лекции</label>
                                <textarea type="text" name="theme_info" id="theme_info" cols="100" class="form-control" rows="3" placeholder="Введите краткое содержание лекции" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Сохранить</button>
                        <a class="btn btn-outline-secondary btn-lg mt-4" href="kurses.php">Назад</a>
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
                        <a href="kurses.php" class="btn btn-outline-primary mb-3 me-3" type="button">Назад</a>
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
