<?php 
    include ("../database/databaseInfo.php");
    $kurs_id    = $_GET['kurs_id'];
    $data       = kurs($link, $kurs_id);
    $authors    = authors($link, $kurs_id);
    foreach ($data as $key => $value) {
        $kurs_name = $value[1];
    }
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
                        <h6 class="border-bottom pb-2 mb-0">Преподаватели</h6>
                            <div class="d-flex text-muted pt-3">
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <p>
                                        <?
                                            $n = 0;
                                            foreach ($authors as $key => $value) {
                                                $n++;
                                                $author_id = $value[0];
                                                $authors_name = $value[2];
                                                $authors_reg = $value[3];
                                                echo $n . '. ' . $authors_name . '</br></br>' . $authors_reg . '</br></br>
                                                <a href="delete_author.php?kurs_id=' . $kurs_id . '&author_id=' . $author_id . '">Удалить</a></br></br>';

                                        }
                                        ?></p>
                                    </div>
                                </div>
                            </div>
                            </br><h4>Добавить автора:</h4></br>
                            <?php echo '<form method="POST" action="save_author.php?kurs_id=' . $kurs_id . '" enctype="multipart/form-data">'?>
                                <h4>ФИО</h4>
                                <input size="70" type="text" name="author_name" class="form-control"  cols="100" rows="3" placeholder="Введите ФИО автора курса" required></input></br></br>
                                <p><h4>Регалии</h4></p>
                                <textarea type="text" name="author_reg"  cols="100" class="form-control" rows="3" placeholder="Укажите регалии автора (ученая степень, ученое звание, прочие регалии и заслуги)" required></textarea></br></br>
                                <?php echo '<a href="view_kurs.php?kurs_id='. $kurs_id . '"class="btn btn-outline-primary me-2">Вернуться</a>'?>
                                <input type="submit" name="submit" value="Добавить автора" class="btn btn-outline-primary me-2">
                            </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h2>Личный кабинет</h2>
                        <p>Вы авторизировались как <strong>«Администратор»</strong>.</p> 
<!--                         <p>Вам доступны следующие дествия:</p>
                        <a href="add_teacher.php" class="btn btn-primary mb-3 me-3" type="button">Добавить преподавателя</a>
                        <a href="delete_info.php"  class="btn btn-outline-secondary mb-3" type="button">Архив</a> -->
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
