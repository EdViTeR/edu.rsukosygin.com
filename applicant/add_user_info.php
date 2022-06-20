<?php
	session_start();
	// var_dump($_SESSION); die;
    include ("../database/databaseInfo.php");
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    $photo = view_photo($dbo, $_SESSION['user']['id']);
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
                    <li class="breadcrumb-item active" aria-current="page">Заполнение профиля</li>
                  </ol>
                </nav><hr>
                <div class="col-lg-8">
                    <h4 class="mb-3 ">Заполнение профиля</h5>
                    <hr>
                    <form method="POST" action="save_user_info.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="phone" class="form-label">Телефон<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+79009997788" required>
                            </div>
                            <div class="col-7">
                                <label for="academic_degree_title" class="form-label">Ученая степень<span class="text-muted"></span></label>
                                <br>
                                <select class="btn btn-outline-secondary dropdown-toggle col-5 select_background" name="academic_degree_title">
                                  <option value="б/с">Без степени</option>
                                  <option value="к.">Кандидат</option>
                                  <option value="д.">Доктор</option>
                                </select>
                                <select class="btn btn-outline-secondary dropdown-toggle col-5 select_background" name="academic_degree">
                                    <option value="б/с">Без степени</option>
                                    <option value="арх.н.">архитектурных наук</option>
                                    <option value="б.н.">биологических наук</option>
                                    <option value="в.н.">ветеринарных наук</option>
                                    <option value="воен.н.">военных наук</option>
                                    <option value="г.н.">географических наук</option>
                                    <option value="г.-м.н.">геолого-минералогических наук</option>
                                    <option value="иск.">искусствоведения
                                    <option value="и.н.">исторических наук</option>
                                    <option value="м.н.">медицинских наук</option>
                                    <option value="п.н.">педагогических наук</option>
                                    <option value="пол.н.">политологических наук</option>
                                    <option value="псх.н.">психологических наук</option>
                                    <option value="с.-х.н.">сельскохозяйственных наук</option>
                                    <option value="соц.н.">социологических наук</option>
                                    <option value="т.н.">технических наук</option>
                                    <option value="фарм.н.">фармацевтических наук</option>
                                    <option value="ф.-м.н.">физико-математических наук</option>
                                    <option value="фил.н.">филологических наук</option>
                                    <option value="ф.н.">философских наук</option>
                                    <option value="х.н.">химических наук</option>
                                    <option value="э.н.">экономических наук</option>
                                    <option value="ю.н.">юридических наук</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="academic_title" class="form-label">Ученое звание<span class="text-muted"></span></label>
                                <br>
                                <select class="btn btn-outline-secondary dropdown-toggle col-10 select_background" name="academic_title">
                                    <option value="б/з">Без звания</option>
                                    <option value="доц.">доцент</option>
                                    <option value="проф.">профессор</option>
                                    <option value="акад. РААСН">академик РААСН</option>
                                    <option value="акад. РАМН">академик РАМН</option>
                                    <option value="акад. РАМ">академик РАН</option>
                                    <option value="акад. РАО">академик РАО</option>
                                    <option value="акад. РАСХН">академик РАСХН</option>
                                    <option value="акад. РАХ">академик РАХ</option>
                                    <option value="член-корр. РААСН">член-корреспондент РААСН</option>
                                    <option value="член-корр. РАМН">член-корреспондент РАМН</option>
                                    <option value="член-корр. РАН">член-корреспондент РАН</option>
                                    <option value="член-корр. РАО">член-корреспондент РАО</option>
                                    <option value="член-корр. РАСХН">член-корреспондент РАСХН</option>
                                    <option value="член-корр. РАХ">член-корреспондент РАХ</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="job_place" class="form-label">Место работы<span class="text-muted"></span></label>
                                <br>
                                <select class="btn btn-outline-secondary dropdown-toggle col-8 select_background" name="job_place">
                                  <option value="1">РГУ им. А.Н. Косыгина</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="department" class="form-label">Отдел<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="department" name="department" placeholder="" value="" required>
                            </div>
                            <div class="col-12">
                                <label for="job_title" class="form-label">Должность<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="job_title" name="job_title" placeholder="" value="" required>
                            </div>
                            <div class="col-12">
                                <label for="about" class="form-label">О себе<span class="text-muted"></span></label>
                                <textarea type="text" name="about" id="about"  cols="100" class="form-control" rows="4" placeholder="Расскажите о себе" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Сохранить</button>
                        <a class="btn btn-outline-secondary btn-lg mt-4" href="user.php">Назад</a>
                        <?php
                            if (isset($_SESSION['errors'])) {
                                echo '<p class="message">' . $_SESSION['errors'] . '</p>';
                            }
                            if (isset($_SESSION['access'])) {
                                echo '<p class="access">' . $_SESSION['access'] . '</p>';
                            }
                            unset($_SESSION['errors']);
                            unset($_SESSION['access']);
                        ?>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-white border rounded-3">
                        <?php
                        if (!empty($photo) & isset($photo)) {
                            echo '<div class="photo_none">
                                <img src=' . $photo . ' width="200" height="300" class="avatar"></div>
                                <p class="h5 mt-4 mb-4">' . $name . '</p>
                                <div class="photo_tool">
                                    <p>Изменить фото</p>
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        <input type="file" name="image"><br><br>
                                        <button type="submit" class="btn btn-outline-secondary mb-3 me-3">Загрузить</button>
                                    </form>
                                </div>                
                            ';
                        } else {
                            echo '
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#CCC" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                <div class="photo_tool">
                                <p>Добавьте фото</p>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="image"><br><br>
                                    <button type="submit" class="btn btn-outline-secondary mb-3 me-3">Загрузить</button>
                                </form></div>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Подвал -->
        <div class="container footer">
            <footer class="py-3 my-4">
                <p class="text-center text-muted border-top pt-3 ">&copy; 2022 РГУ им. А.Н. Косыгина</p>
            </footer>
        </div>

    </body>
</html>
