<?php
session_start();
include ("../database/databaseInfo.php");
$user_id = $_GET['user_id'];
$status = $_GET['status'];
$username = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'];
$kurs = kurs_data_all($dbo, $status);
$kurs_info = kurs_data($dbo, $status);
$photo = view_photo($dbo, $_SESSION['user']['id']);
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
        <div class="container">
            <div class="row">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="user.php">Главная</a></li>
                        <li class="breadcrumb-item"><a href="view_kurs.php?kurs_id=<?php echo $status; ?>"><?php echo $kurs_info["kurs_name"];?></a></li>
                        <li class="breadcrumb-item">Изменение информации о курсе</li>
                    </ol>
                </nav>
                <div class="col-lg-8">
                    <!-- Преподаватели -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <h4 class="border-bottom pb-2 mb-0">Изменение информации о курсе</h4>
                        <?php echo '<form method="POST" action="save_kurs_edit.php?user_id='. $user_id . '&status=' . $status . '" enctype="multipart/form-data">'?>
                            <p><h5>Название онлайн-курса</h5></p>
                            <textarea type="text" name="kurs_name" class="form-control"  cols="100" rows="2" placeholder="Укажите полное название" required><?php echo $kurs_name?></textarea>
                            </br>
                            <p><h5>Короткое название онлайн-курса(если возможно)</h5></p>
                            <textarea type="text" name="short_name" class="form-control"  cols="100" rows="2" placeholder="Укажите короткое название (при возможности)" required><?php echo $short_name?></textarea>
                            </br>
                            <p><h5>Руководитель онлайн курса</h5></p>
                            <textarea type="text" name="head_name" class="form-control"  cols="100" rows="2" placeholder="ФИО руководителя курса" required><?php echo $head_name?></textarea>
                            </br>
                            <p><h5>Регалии руководителя онлайн курса</h5></p>
                            <textarea type="text" name="head_reg" class="form-control"  cols="100" rows="3" placeholder="Ф. И. О., ученая степень, ученое звание (пр. регалии и заслуги)" required><?php echo $head_reg?></textarea>
                            </br>
                            <p><h5>Краткая аннотация онлайн-курса(не более 1000 знаков)</h5></p>
                            <textarea type="text" name="kurs_short_info" class="form-control"  cols="100" rows="3" placeholder="В этом поле укажите текст краткой аннотации онлайн-курса для размещения на образовательной онлайн-платформе в разделе «Описание к курсу» объемом не более 1000 печатных знаков." maxlength=1000  required><?php echo $kurs_short_info?></textarea>
                        </br>
                    </div>
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p><h5>Текст выступления к видео-презентации онлайн-курса (не более 1,5 минут)</h5></p>
                            <hr>
                            </br>
                            <p><h5>ФИО спикера</h5></p>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="form-control" name="speaker_name" size="70" placeholder="Укажите ФИО спикера" maxlength=100 value="<?php echo $speaker_name?>" required></input>
                            </br></br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h5>Текст с информацией о спикере</h5>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea type="text" class="form-control" name="short_video_text_speaker"  cols="100" rows="4" placeholder="В этом поле укажите текст выступления спикера с приветствием и небольшим рассказом о себе (опыт, достижения, заслуги)." required><?php echo $short_video_text_speaker?></textarea>
                            </br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h5>Текст с информацией о курсе</h5>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea type="text" class="form-control" name="short_video_text_kurs"  cols="100" rows="5" placeholder="В этом поле укажите текст выступления спикера с рассказом, о чем курс (в целом). Что будете изучать (подробнее)? О чем рассказывать? Чем полезен курс? Какие компетенции приобретет слушатель? Прочее. " required><?php echo $short_video_text_kurs?></textarea>
                            </br>
                            <?php echo '<a href="view_kurs.php?kurs_id=' . $kurs_info['id'] . '" class="btn btn-outline-primary me-2">Вернуться</a>'?>
                            <input type="submit" name="submit_image" value="Изменить" class="btn btn-outline-primary me-2">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-white border rounded-3">
                        <!-- <img src="/images/я.jpg" alt="Письма мастера дзен" width="160" height="160"> -->
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
                        <p class="h5 mt-4 mb-4"><?php echo $username?></p>

                        <p>Вы авторизировались как <strong>«<?php echo $_SESSION['user']['user_status'];?>»</strong>.</p> 
                        <!-- <p>Вам доступны следующие дествия:</p> -->
                    </div>
                </div>
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