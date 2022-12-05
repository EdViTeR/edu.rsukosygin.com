<?php
    include ("../database/databaseInfo.php");
    session_start();
    $user_id    = $_SESSION['user']['id'];
    $kurs_id    = $_GET['kurs_id'];
    $theme_id   = $_GET['theme_id'];
    $theme = themes_info($dbo, $theme_id);
    foreach ($theme as $key => $value) {
        $name       = $value['name'];
        $info       = $value['info'];
        $text_less  = $value['text_less'];
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
        <div class="container-fluid page">
        <div class="container">
            <div class="col-md-8 order-md-first">
                <h3 class="title-article">
                    Изменение темы
                </h3>
                <h3 class="title-article">
                    <?php echo $name;?>
                </h3>
            </div>
            <?php echo '<form method="POST" action="save_theme_edit.php?kurs_id=' . $kurs_id . '&theme_id=' . $theme_id . '" enctype="multipart/form-data">'?>
                <p><h3>Название темы</h3></p>
                    <textarea type="text" name="theme_name" class="form-control" cols="100" rows="3" placeholder="Укажите название темы лекции" required><?php echo $name;?></textarea>
                </br></br>
                <p><h3>Краткая аннотация по теме лекции</h3></p>
                    <textarea type="text" name="theme_info" class="form-control"  cols="100" rows="3" placeholder="В этом поле укажите краткую аннотацию по теме лекции объемом не более 1000 печатных знаков" maxlength=1000 required><?php echo $info;?></textarea>
                </br></br>
                <p><h3>Текст лекции</h3></p>
                    <textarea type="text" name="text_less" class="form-control"  cols="100" rows="3" placeholder="В этом поле укажите текст выступления спикера, полную речь по теме лекции (от 6 до 10 минут)" required><?php echo $text_less;?></textarea>
                </br></br>
                <?php echo '<a href="user.php"class="btn btn-outline-primary me-2">Вернуться</a>'?>
                <input type="submit" name="submit_image" value="Изменить" class="btn btn-outline-primary me-2">
            </form>
        </div>
        <div>
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