<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Добавление пользователя</title>
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
                    <h4 class="mb-3">Новый пользователь</h4>
                    <form method="POST" action="../save_user.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label for="first_name" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="last_name" class="form-label">Отчество</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Пароль <span class="text-muted"></span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <label for="password" class="form-label">Повторите пароль <span class="text-muted"></span></label>
                                <input type="password" class="form-control" id="password" name="repeat_password" placeholder="Повторите пароль" required>
                                <!-- <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div> -->
                            </div>

<!--                             <div class="col-12">
                                <label for="department" class="form-label">Кафедра</label>
                                <input type="text" class="form-control" id="department" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="position" class="form-label">Должность</label>
                                <input type="text" class="form-control" id="position" placeholder="" value="" required="">
                            </div> -->

                            <div class="col-sm-6">
                                <label for="role" class="form-label">Роль</label>
                                <select class="form-select" id="role" name="role" required>
                                    <!-- <option value="0">Выберите роль...</option> -->
                                    <option value="1">Преподаватель</option>
                                    <option value="2">Администратор</option>
                                    <option value="3">Продюссер</option>
                                    <option value="4">Пользователь</option>
                                    <option value="5">Эксперт</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid role.
                                </div>
                            </div>
                        </div>
                        <!-- <p class="mt-4">Последние изменение: 21.01.2022 в 23:23</p> -->
                        <button class="btn btn-primary btn-lg mt-4 me-3" type="submit">Сохранить</button>
                        <a class="btn btn-outline-secondary btn-lg mt-4" href="check_teacher.php">Отменить</a>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-light border rounded-3">
                        <h2>Личный кабинет</h2>
                        <p>Внимательно проверьте все данные преподавателя перед сохранением.</p>
                    </div>
                </div>
            </div>
        </div>
    
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
