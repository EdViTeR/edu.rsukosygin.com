<?php 
    include ("../database/databaseInfo.php");
	$user_id    = $_GET['user_id'];
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
                <a href="user.php?user_id=<?php echo $user_id;?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="../images/rsu_logo.svg" alt="" width="200"></a>
                </a>
                <div class="col-md-3 text-end">
                    <a href="../index.php" class="btn btn-outline-primary me-2">Выйти</a>
                </div>
            </header>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-md-first">
                    <h3 class="title-article">
                        <? echo $kurs_name;?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="container-fluid page">
            <div class="container">
                <h3>Редактирование авторов курса</h3>
                </br><hr>
                </br>
                <h3>Добавленные авторы:</h3>
                <?php 
                    if (!$authors) {
                        echo "<h2></br>Авторов курса нет</h2>";
                    }
                ?>
                </br></br>
                    <div class="text-center">
                        <table class="table table-striped">
                            <thead>
                            <?
                                $n = 0;
                                foreach ($authors as $key => $value) {
                                    $n++;
                                    $author_id = $value[0];
                                    $authors_name = $value[2];
                                    $authors_reg = $value[3];
                                    echo '<tr><td style="width: 400px;">' . $n . '. ' . $authors_name .'</td>
                                    <td style="width: 800px;">' . $authors_reg . '</td>
                                    <td style="width: 100px;"><a href="delete_author.php?user_id=' . $user_id . '&kurs_id=' . $kurs_id . '&author_id=' . $author_id . '">Удалить</a></td></tr>';
                                }
                            ?>

                            </thead>
                        </table>
                    </div>
                </br></br>
                <hr>
                </br>
                <h3>Добавить автора:</h3>
                </br>
                <?php echo '<form method="POST" action="save_author.php?user_id=' . $user_id . '&kurs_id=' . $kurs_id . '" enctype="multipart/form-data">'?>
                <form method="POST" action="save_kurs.php" enctype="multipart/form-data">
                    <p><h3>ФИО</h3></p>
                        <input size="70" type="text" name="author_name" class="form-control"  cols="100" rows="3" placeholder="Введите ФИО автора курса" required></input>
                    </br></br>
                    <p><h3>Регалии</h3></p>
                        <textarea type="text" name="author_reg"  cols="100" class="form-control" rows="3" placeholder="Укажите регалии автора (ученая степень, ученое звание, прочие регалии и заслуги)" required></textarea>
                    </br></br>
                    <?php echo '<a href="user.php?user_id='. $user_id . '"class="btn btn-outline-primary me-2">Вернуться</a>'?>
                    <input type="submit" name="submit" value="Добавить автора" class="btn btn-outline-primary me-2">
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
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