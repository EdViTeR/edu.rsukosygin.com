<?php
    include ("../database/databaseInfo.php");
    $kurs_id = $_GET['id'];
    $data = kurs($link, $kurs_id);
    foreach ($data as $key => $value) {
        $name           = $value[1];
        $data           = $value[2];
        $time           = $value[3];
        $for_whom       = $value[4];
        $why            = $value[5];
        $author         = $value[6];
        $prog           = $value[7];
        $author_info    = $value[8];
        $author_photo   = $value[9];
    }
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>RSU Kosygin</title>
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
                <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="emblem" src="/images/emblem.svg" alt="RSU Kosygin">
                </div>
                <div class="col-md-8 order-md-first">
                    <a href="/index.html"><img class="logo" src="/images/logo.svg" alt="RSU Kosygin"></a>
                    <h1 class="title-article">
                        <?echo $name;?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="container">
            <form method="POST" action="save_change.php" enctype="multipart/form-data">
                <p><h2>Название</h2></p>
                    <textarea type="text" name="name"  cols="100" rows="3"><?php echo $name;?></textarea>
                </br></br></br></br>
                <p><h2>Краткая информация</h2></p>
                    <textarea type="text" name="data"  cols="100" rows="3"><?php echo $data;?></textarea>
                </br></br></br></br>
                <p><h2>Время курса</h2></p>
                    <textarea type="text" name="time"  cols="100" rows="3"><?php echo $time;?></textarea>
                </br></br></br></br>
                <p><h2>Для кого этот курс</h2></p>
                    <textarea type="text" name="for_whom"  cols="100" rows="3"><?php echo $for_whom;?></textarea>
                </br></br></br></br>
                <p><h2>Зачем этот курс</h2></p>
                    <textarea type="text" name="why"  cols="100" rows="3"><?php echo $why;?></textarea>
                </br></br></br></br>
                <p><h2>Слова автора</h2></p>
                    <textarea type="text" name="author"  cols="100" rows="3"><?php echo $author;?></textarea>
                </br></br></br></br>
                <p><h2>Программа курса</h2></p>
                    <textarea type="text" name="prog"  cols="100" rows="3"><?php echo $prog;?></textarea>
                </br></br></br></br>
                <p><h2>Информация об авторах курса</h2></p>
                    <textarea type="text" name="author_info"  cols="100" rows="3"><?php echo $author_info;?></textarea>
                </br></br></br></br>
                <p><h2>Информация об авторах курса</h2></p>
                    <textarea type="text" name="author_photo"  cols="100" rows="3"><?php echo $author_info;?></textarea>
                </br></br></br></br>
                <input type="submit" name="submit_image" value="Изменить информацию">
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>