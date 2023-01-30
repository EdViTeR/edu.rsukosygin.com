<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    include ("../database/databaseInfo.php");
    $reviews = reviews($dbo);
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
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
                    <a href="../logout.php" class="btn btn-outline-primary me-2">Выйти</a>
                </div>
            </header>
        </div>
        <!-- Контент -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Статистика -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Отзывы от экспертов</p>
                        <hr class="text-secondary">
                        <?php
                            foreach ($reviews as $key => $value) {
                                $review = $value['review'];
                                $k++;
                                    echo '<div class="d-flex text-muted pt-3">
                                                <a data-bs-toggle="collapse" href="#collapseExample'.$k.'" role="button" aria-expanded="false" aria-controls="collapseExample'.$k.'"><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
                                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                                <div class="d-flex justify-content-between">
                                                    <strong class="text-gray-dark">Отзыв '.$k.'</strong>
                                                </div>
                                            <div class="collapse" id="collapseExample'.$k.'">
                                            </br>
                                                <div class="card card-body">
                                                    <b>Отзыв</b>
                                                    <hr>
                                                    ' . $review . '
                                                </div></br>
                                                </div>
                                            </div>
                                        </div>';
                            }
                        ?>
                        <small class="d-block text-end mt-3">
                            <a href="check_teacher.php">Назад</a>
                        </small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h3>Панель администратора</h3></br>
                        <p>Страница отзывов</p>
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