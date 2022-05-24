<?php
    include ("../database/databaseInfo.php");
    $kurs_id    = $_GET['kurs_id'];
    $user_id    = $_GET['user_id'];
    $theme_id   = $_GET['theme_id'];
    $theme = theme($dbo, $theme_id);
    foreach ($theme as $key => $value) {
        $name           = $value->theme_name;
        $short_info     = $value->theme_info;
        $text_less      = $value->text_less;
        $quest1         = $value->quest1;
        $answ11         = $value->answ11;
        $answ12         = $value->answ12;
        $answ13         = $value->answ13;
        $answ14         = $value->answ14;
        $true1          = $value->true1;
        $quest2         = $value->quest2;
        $answ21         = $value->answ21;
        $answ22         = $value->answ22;
        $answ23         = $value->answ23;
        $answ24         = $value->answ24;
        $true2          = $value->true2;
        $quest3         = $value->quest3;
        $answ31         = $value->answ31;
        $answ32         = $value->answ32;
        $answ33         = $value->answ33;
        $answ34         = $value->answ34;
        $true3          = $value->true3;
        $quest4         = $value->quest4;
        $answ41         = $value->answ41;
        $answ42         = $value->answ42;
        $answ43         = $value->answ43;
        $answ44         = $value->answ44;
        $true4          = $value->true4;
        $quest5         = $value->quest5;
        $answ51         = $value->answ51;
        $answ52         = $value->answ52;
        $answ53         = $value->answ53;
        $answ54         = $value->answ54;
        $true5          = $value->true5;
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
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-md-first">
                    <h1 class="title-article">
                        Изменение темы
                    </h1>
                    <h1 class="title-article">
                        <?php echo $name;?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="container-fluid page">
        <div class="container">
            <?php echo '<form method="POST" action="save_theme_edit.php?kurs_id=' . $kurs_id . '&theme_id=' . $theme_id . '&user_id=' . $user_id .'" enctype="multipart/form-data">'?>
                <p><h2>Название темы</h2></p>
                    <textarea type="text" name="theme_name" class="form-control" cols="100" rows="3" placeholder="Укажите название темы лекции" required><?php echo $name;?></textarea>
                </br></br>
                <p><h2>Краткая аннотация по теме лекции</h2></p>
                    <textarea type="text" name="theme_info" class="form-control"  cols="100" rows="3" placeholder="В этом поле укажите краткую аннотацию по теме лекции объемом не более 1000 печатных знаков" maxlength=1000 required><?php echo $short_info;?></textarea>
                </br></br>
                <p><h2>Текст лекции</h2></p>
                    <textarea type="text" name="text_less" class="form-control"  cols="100" rows="3" placeholder="В этом поле укажите текст выступления спикера, полную речь по теме лекции (от 6 до 10 минут)" required><?php echo $text_less;?></textarea>
                </br></br>
                <p><h2>Мини-тест лекции (от 3 до 5 вопросов)</h2>
                <h2><u><i>необходимо указать номер правильного ответа (правильный ответ может быть только один)</h2></u></i></p>
                </br>
                <p><h3>Вопрос №1</h3></p>
                    <textarea name="question1" class="form-control" cols="100" rows="2" placeholder="Текст вопроса №1?" required><?php echo $quest1;?></textarea>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>1.</h6>
                        </div>
                        <div class="col">
                        <textarea for="check11" size="50" name="answer11" class="form-control" placeholder="Введите вариант ответа на вопрос №1" required><?php echo $answ11;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>2.</h6>
                        </div>
                        <div class="col">
                        <textarea size="50" for="check12" name="answer12" class="form-control" placeholder="Введите вариант ответа на вопрос №1" required><?php echo $answ12;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>3.</h6>
                        </div>
                        <div class="col">
                        <textarea size="50" for="check13" name="answer13" class="form-control" placeholder="Введите вариант ответа на вопрос №1" required><?php echo $answ13;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>4.</h6>
                        </div>
                        <div class="col">
                        <textarea size="50" for="check14" name="answer14" class="form-control" placeholder="Введите вариант ответа на вопрос №1" required><?php echo $answ14;?></textarea>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h3>Правильный ответ: </h3>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true1" value="<?php echo $true1;?>"required></input>
                        </div>
                    </div>
                    </br>
                    </br></br>
                <p><h3>Вопрос №2</h3></p>
                    <textarea name="question2"  cols="100" rows="2" class="form-control" placeholder="Текст вопроса №2?" required><?php echo $quest2;?></textarea>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                           <h6>1.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check21" name="answer21" class="form-control" placeholder="Введите вариант ответа на вопрос №2" required><?php echo $answ21;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                           <h6>2.</h6>
                       </div>
                       <div class="col">
                            <textarea size="50" for="check22" name="answer22" class="form-control" placeholder="Введите вариант ответа на вопрос №2" required><?php echo $answ22;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                           <h6>3.</h6>
                            </div>
                        <div class="col">
                            <textarea size="50" for="check23" name="answer23" class="form-control" placeholder="Введите вариант ответа на вопрос №2" required><?php echo $answ23;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                           <h6>4.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check24" name="answer24" class="form-control" placeholder="Введите вариант ответа на вопрос №2" required><?php echo $answ24;?></textarea>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h3>Правильный ответ: </h3>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true2" value="<?php echo $true2;?>" required></input>
                        </div>
                    </div>
                    </br>
                    </br></br>
                <p><h3>Вопрос №3</h3></p>
                    <textarea name="question3" class="form-control" cols="100" rows="2" placeholder="Текст вопроса №3?" required><?php echo $quest3;?></textarea>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>1.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check31" name="answer31" class="form-control" placeholder="Введите вариант ответа на вопрос №3" required><?php echo $answ31;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                           <h6>2.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check32" name="answer32" class="form-control" placeholder="Введите вариант ответа на вопрос №3" required><?php echo $answ32;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>3.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check33" name="answer33" class="form-control" placeholder="Введите вариант ответа на вопрос №3" required><?php echo $answ33;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>4.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check34" name="answer34" class="form-control" placeholder="Введите вариант ответа на вопрос №3" required><?php echo $answ34;?></textarea>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h3>Правильный ответ: </h3>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true3" value="<?php echo $true3;?>" required></input>
                        </div>
                    </div>
                    </br>
                    </br></br>
                <p><h3>Вопрос №4</h3></p>
                    <textarea name="question4" class="form-control" cols="100" rows="2" placeholder="Текст вопроса №4?"><?php echo $quest4;?></textarea>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>1.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check41" name="answer41" class="form-control" placeholder="Введите вариант ответа на вопрос №4"><?php echo $answ41;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>2.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check42" name="answer42" class="form-control" placeholder="Введите вариант ответа на вопрос №4"><?php echo $answ42;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>3.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check43" name="answer43" class="form-control" placeholder="Введите вариант ответа на вопрос №4"><?php echo $answ43;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>4.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check44" name="answer44" class="form-control" placeholder="Введите вариант ответа на вопрос №4"><?php echo $answ44;?></textarea>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h3>Правильный ответ: </h3>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true4" value="<?php echo $true4;?>" required></input>
                        </div>
                    </div>
                    </br></br>
                <p><h3>Вопрос №5</h3></p>
                    <textarea name="question5" class="form-control" cols="100" rows="2" placeholder="Текст вопроса №5?"><?php echo $quest5;?></textarea>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>1.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check51" name="answer51" class="form-control" placeholder="Введите вариант ответа на вопрос №5"><?php echo $answ51;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>2.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check52" name="answer52" class="form-control" placeholder="Введите вариант ответа на вопрос №5"><?php echo $answ52;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>3.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check53" name="answer53" class="form-control" placeholder="Введите вариант ответа на вопрос №5"><?php echo $answ53;?></textarea>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row">
                        <div class="col-1" align="right">
                            <h6>4.</h6>
                        </div>
                        <div class="col">
                            <textarea size="50" for="check54" name="answer54" class="form-control" placeholder="Введите вариант ответа на вопрос №5"><?php echo $answ54;?></textarea>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h3>Правильный ответ: </h3>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true5" value="<?php echo $true5;?>" required></input>
                        </div>
                    </div>
                    </br></br>
                <?php echo '<a href="view_kurs.php?kurs_id=' . $kurs_id . '&user_id=' . $user_id .'"class="btn btn-outline-primary me-2">Вернуться</a>'?>
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