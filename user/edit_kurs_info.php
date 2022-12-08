<?php
include ("../database/databaseInfo.php");
$user_id = $_GET['user_id'];
$status = $_GET['status'];
$kurs = kurs_data_all($dbo, $status);
foreach ($kurs as $key => $value) {
    $kurs_name                  = $value['kurs_name'];
    $short_name                 = $value['short_name'];
    $head_name                  = $value['head_name'];
    $head_reg                   = $value['head_reg'];
    $kurs_short_info            = $value['kurs_short_info'];
    $speaker_name               = $value['speaker_name'];
    $short_video_text_speaker   = $value['short_video_text_speaker'];
    $short_video_text_kurs      = $value['short_video_text_kurs'];
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
                    <a href="../logout.php" class="btn btn-outline-primary me-2">Выйти</a>
                </div>
            </header>
        </div>
        <div class="container-fluid page">
            <div class="container">
            <div class="col-md-8 order-md-first">
                <h3 class="title-article">Изменение информации о курсе</h3></br>
            </div>
            <?php echo '<form method="POST" action="save_kurs_edit.php?user_id='. $user_id . '&status=' . $status . '" enctype="multipart/form-data">'?>
                <p><h3>Название онлайн-курса</h3></p>
                    <textarea type="text" name="kurs_name" class="form-control"  cols="100" rows="3" placeholder="Укажите полное название" required><?php echo $kurs_name?></textarea>
                </br></br>
                <p><h3>Короткое название онлайн-курса(если возможно)</h3></p>
                    <textarea type="text" name="short_name" class="form-control"  cols="100" rows="3" placeholder="Укажите короткое название (при возможности)" required><?php echo $short_name?></textarea>
                </br></br>
                <p><h3>Руководитель онлайн курса</h3></p>
                    <textarea type="text" name="head_name" class="form-control"  cols="100" rows="2" placeholder="ФИО руководителя курса" required><?php echo $head_name?></textarea>
                </br></br>
                <p><h3>Регалии руководителя онлайн курса</h3></p>
                    <textarea type="text" name="head_reg" class="form-control"  cols="100" rows="3" placeholder="Ф. И. О., ученая степень, ученое звание (пр. регалии и заслуги)" required><?php echo $head_reg?></textarea>
                </br></br>
                <p><h3>Краткая аннотация онлайн-курса(не более 1000 знаков)</h3></p>
                    <textarea type="text" name="kurs_short_info" class="form-control"  cols="100" rows="3" placeholder="В этом поле укажите текст краткой аннотации онлайн-курса для размещения на образовательной онлайн-платформе в разделе «Описание к курсу» объемом не более 1000 печатных знаков." maxlength=1000  required><?php echo $kurs_short_info?></textarea>
                </br></br>
                <hr>
                </br></br>
                <p><h3>Текст выступления к видео-презентации онлайн-курса (не более 1,5 минут)</h3></p>
                </br></br>
                <hr>
                </br>
                <p><h3>ФИО спикера</h3></p>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="form-control" name="speaker_name" size="70" placeholder="Укажите ФИО спикера" maxlength=100 value="<?php echo $speaker_name?>" required></input>
                </br></br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h4>Текст с информацией о спикере</h3>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea type="text" class="form-control" name="short_video_text_speaker"  cols="100" rows="3" placeholder="В этом поле укажите текст выступления спикера с приветствием и небольшим рассказом о себе (опыт, достижения, заслуги)." required><?php echo $short_video_text_speaker?></textarea>
                </br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h4>Текст с информацией о курсе</h3>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea type="text" class="form-control" name="short_video_text_kurs"  cols="100" rows="3" placeholder="В этом поле укажите текст выступления спикера с рассказом, о чем курс (в целом). Что будете изучать (подробнее)? О чем рассказывать? Чем полезен курс? Какие компетенции приобретет слушатель? Прочее. " required><?php echo $short_video_text_kurs?></textarea>
                </br></br></br>
                <?php echo '<a href="user.php"class="btn btn-outline-primary me-2">Вернуться</a>'?>
                <input type="submit" name="submit_image" value="Изменить" class="btn btn-outline-primary me-2">
            </form>
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