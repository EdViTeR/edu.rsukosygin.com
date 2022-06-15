<?php
	session_start();
    include ("../database/databaseInfo.php");
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    $user_id = $_SESSION['user']['id'];
    $name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'];
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
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
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
                    <h4 class="mb-3 ">Заполнение данных об онлайн-курсе</h4>
                    <hr>
					<h5 class="mb-3 ">Сведения об онлайн-курсе</h5><br>
                    <form method="POST" action="save_order_proect.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="kurs_name" class="form-label">Название курса</label>
                                <input type="text" class="form-control" id="kurs_name" name="kurs_name" placeholder="Введите название онлайн-курса" required>
                            </div>
                            <div class="col-12">
                                <label for="replacement" class="form-label">Дисциплина, которая заменяется онлайн-курсом</label>
                                <textarea type="text" name="replacement" id="replacement" cols="100" class="form-control" rows="3" placeholder="" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="route" class="form-label">Направление(я) подготовки специальность(ти)</label>
                                <textarea type="text" name="route" id="route" cols="100" class="form-control" rows="3" placeholder="Например: 09.03.01 Информатика и вычислительная техника" required></textarea>
                            </div>
                            <br></br><br></br><br></br>
                            <hr>
                            <h5 class="mb-3 ">Описание онлайн-курса (аннотация)</h5><br>
                            <div class="col-12">
                                <label for="target" class="form-label">Целевая аудитория</label>
                                <textarea type="text" name="target" id="target" cols="100" class="form-control" rows="3" placeholder="Представьте и опишите несколько типов слушателей курса: их образование, интересы, цели, профиль деятельности." required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="user_level" class="form-label">Необходимый уровень подготовки слушателей</label>
                                <textarea type="text" name="user_level" id="user_level" cols="100" class="form-control" rows="3" placeholder="Какими знаниями должен обладать слушатель для того, чтобы пройти курс?" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="work_time" class="form-label">Общая трудоемкость и недельное распределение</label>
                                <textarea type="text" name="work_time" id="work_time" cols="100" class="form-control" rows="3" placeholder="Сколько часов в неделю в среднем займет у студента прохождение Вашего курса? Включайте в эту цифру время на просмотр видео и решение заданий." required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="structure_ok" class="form-label">Структура онлайн-курса</label>
                                <textarea type="text" name="structure_ok" id="structure_ok" cols="100" class="form-control" rows="3" placeholder="Необходимо отразить упорядоченный список разделов и тем курса" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="assessment_formula" class="form-label">Формула оценивания результатов освоения курса</label>
                                <textarea type="text" name="assessment_formula" id="assessment_formula" cols="100" class="form-control" rows="3" placeholder="Укажите в процентах, какую долю итоговой оценки за курс составляет каждый вид заданий" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="study_result" class="form-label">Результаты обучения</label>
                                <textarea type="text" name="study_result" id="study_result" cols="100" class="form-control" rows="3" placeholder="Результаты обучения должны быть сформулированы как сформированность компетенций е в количестве (2-3х)." required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="discipline_result" class="form-label">Результаты освоения данного курса могут быть учтены для следующих дисциплин, реализуемых в Университете</label>
                                <textarea type="text" name="discipline_result" id="discipline_result" cols="100" class="form-control" rows="3" placeholder="Код и направление подготовки: название дисциплины и ее место в учебном плане ООП" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="strategy" class="form-label">Маркетинговая стратегия продвижения онлайн-курса</label>
                                <textarea type="text" name="strategy" id="strategy" cols="100" class="form-control" rows="3" placeholder="Указать формат и ключевые аспекты маркетинговой стратегии продвижения" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="language" class="form-label">Язык (языки) курса</label>
                                <textarea type="text" name="language" id="language" cols="100" class="form-control" rows="2" placeholder="" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="language_agree" class="form-label">Готовы ли Вы создать англоязычную (иноязычную) версию курса?</label>
                                <input type="text" class="form-control" id="language_agree" name="language_agree" placeholder="Укажите язык, либо оставьте поле пустым">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Сохранить</button>
                        <a class="btn btn-outline-secondary btn-lg mt-4" href="user.php">Назад</a>
                        <?php
                            if (isset($_SESSION['errors'])) {
                                echo '<p class="message">' . $_SESSION['errors'] . '</p>';
                            }
                            if (isset($_SESSION['repeat_email'])) {
                                echo '<p class="message">' . $_SESSION['repeat_email'] . '</p>';
                            }
                            unset($_SESSION['errors']);
                            unset($_SESSION['repeat_email']);
                        ?>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-white border rounded-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#CCC" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <p class="h5 mt-4 mb-4"><?php echo $name?></p>
                        <!-- <p>Вы авторизировались как <strong>«Преподаватель»</strong>.</p>  -->
                        <p class="text-muted">Для регистрации заявки необходимо заполнить данные.</p>
                        <b>Перед регистрацией обязательно ознакомьтесь с <a href="example.php">документацией</a>.</b></br></br>
                        <a href="add_author.php" class="btn btn-primary mb-3 me-3" type="button">Добавить автора</a>
                        <a href="add_kurs_info.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Добавить сведения об онлайн-курсе</a>
                        <a href="add_assay.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Добавить онлайн-курса</a>
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
