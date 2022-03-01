<?php 
include ("../database/databaseInfo.php");

$data = deleted($link);
foreach ($data as $key => $value) {
    $info = explode("|", $value[1]);
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
            <header class="pb-3 mb-4 border-bottom">
                <a href="check_teacher.phpl" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="../images/rsu_logo.svg" alt="" width="200"></a>
                </a>
            </header>
        </div>

        <!-- Контент -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="text-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="min-width: 100px;">id</th>
                                    <th style="min-width: 300px;">Email преподавателя</th>
                                    <th style="min-width: 300px;">Имя преподавателя</th>
                                    <th style="min-width: 300px;">Пароль</th>
                                    <th style="min-width: 200px;">Роль</th>
                                    <th style="min-width: 100px;">#</th>
                                </tr>
                                <?
                                    $n = 0;
                                    foreach ($data as $key => $value) {
                                        $info = explode("|", $value[1]);
                                        $id = $value[0];
                                        $teacher_id   = $info[0];
                                        $mail = $info[1];
                                        $name = $info[2];
                                        $pass = $info[4];
                                        if ($info[5] == 1) {
                                            $role = 'Преподаватель';
                                        } else {
                                            $role = 'Админ';
                                        }
                                        echo '<tr><td scope="col">. ' . $id .'</td>
                                        <td scope="col">' . $mail . '</td>
                                        <td scope="col">' . $name . '</td>
                                        <td scope="col">' . $pass . '</td>
                                        <td scope="col">' . $role . '</td>
                                        <td scope="col"><a href="back_info.php?id=' . $id . '" class="btn btn-outline-primary me-2">Восстановить</a><br></td></tr>';
                                    }
                                ?>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="text-center">
                    </br><a href="check_teacher.php" class="btn btn-outline-primary me-2">&nbsp&nbsp&nbsp&nbspНазад&nbsp&nbsp&nbsp&nbsp</a><br>
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
