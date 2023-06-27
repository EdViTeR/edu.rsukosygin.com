<?php 
    session_start();
    switch ($_SESSION['add_status']) {
        case '1':
            $message = 'У нас новенький';
            break;
        case '2':
            $message = 'Что-то не вышло';
            break;
    }
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Создание курса</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body class="body-home">

        <!-- Шапка -->
        <div class="container pt-4">
            <header class="pb-3 mb-4 border-bottom">
                <a href="check_teacher.php" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="../images/rsu_logo.svg" alt="" width="200"></a>
                </a>
            </header>
        </div>

        <!-- Контент -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Преподаватели -->
                    <h4 class="mb-3">Новый курс на главную страницу</h4>
                    <!-- <form method="POST" action="save_user.php" enctype="multipart/form-data"> -->
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label for="first_name" class="form-label">id руководителя</label>
                                <input type="text" class="form-control" id="head_id" name="head_id" placeholder="" value="" required>
                            </div>

                            <div class="col-sm-4">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                            </div>

                            <div class="col-12">
                                <label for="last_name" class="form-label">Краткая информация</label>
                                <textarea type="text" class="form-control" id="last_name" name="data" placeholder="" value="" required></textarea>
                            </div>

                            <div class="col-12">
                                <label for="for_whom" class="form-label">Для кого<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="for_whom" name="for_whom" placeholder="" required>
                            </div>
                            
                            <div class="col-sm-12">
                                <label for="why" class="form-label">Зачем<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="why" name="repeat_password" placeholder="Перечислять через ;" required>
                            </div>
                            
                            <div class="col-sm-12">
                                <label for="author" class="form-label">Имя автора<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="" required>
                            </div>
                            
                            <div class="col-sm-12">
                                <label for="author_reg" class="form-label">Регалии автора<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="author_reg" name="author_reg" placeholder="" required>
                            </div>
                            <div class="col-sm-6">
                            	<form action="upload.php" method="post" enctype="multipart/form-data">
                            		<label for="author_reg" class="form-label">Маленькое фото<span class="text-muted"></span></label><p>
                                	<input type="file" name="image"><br><br>
                                	<button type="submit" class="btn btn-outline-secondary mb-3 me-3">Загрузить</button>
                            	</form>
                        	</div>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Сохранить</button>
                        <a class="btn btn-outline-secondary btn-lg mt-4" href="check_teacher.php">Назад</a>
                    <!-- </form> -->
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h3>Панель администратора</h3></br>
                        <p>Внимательно проверьте все данные преподавателя перед сохранением.</p>
                    </div>
                <?php 
                    if (isset($_SESSION['add_status'])) {
                        echo '<p class="add_status">' . $message . '</p>';
                    } elseif (isset($_SESSION['message'])) {
                        echo '<p class="add_status">' . $message . '</p>';
                    }
                    unset($_SESSION['add_status']);
                ?>
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
