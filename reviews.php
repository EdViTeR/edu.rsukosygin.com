<?php
session_start();

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
                </div>
            </header>
        </div>
        <!-- Контент -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <h5 class="border-bottom pb-2 mb-0">Отзывы и пожелания</h5><br>
                        <form method="POST" action="check_reviews.php">
                            <label for="technology" class="form-label">Оставьте свой отзыв о работе платформы и взаимодействия с ней. Подробно укажите пожелания для улучшения качества работы сервиса, а также совершенствования системы оценивания онлайн-курсов.</label></br></br>
                            <textarea type="text" name="review" class="form-control"  cols="100" rows="7" placeholder="Введите текст" required></textarea>
                            </br>
                            <button class="w-100 btn btn-outline-primary btn-lg">Отправить</button>
                        </form>
                        <?php
                            if ($_SESSION['access']) {
                                echo '</br><style type="text/css">
                                        b { 
                                            color: green;
                                            margin-left: 200px;
                                        }
                                    </style>
                                <b>' . $_SESSION["access"] . '</b></br></br>
                                <a href="logout.php" class="w-100 btn btn-outline-secondary btn-lg">Выйти</a>';
                            } else {
                                echo '</br><a href="logout.php" class="w-100 btn btn-outline-secondary btn-lg">Вернуться</a>';
                            }
                        ?> 
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