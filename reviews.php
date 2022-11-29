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
                        <h6 class="border-bottom pb-2 mb-0">Отзывы и рекомендации по оцениванию заявок онлайн-курсов</h6><br>
                        <form method="POST" action="check_order.php?kurs_id=<? echo $kurs_id; ?>">
                            <label for="structure" type="text"  class="form-label">Использование платформы удобно и интуитивно понятно (от 1 до 10)</label>
                            <input name="structure" min='0' max='10' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 10" value="" required="true">
                            </br>
                            <label for="podhod" class="form-label">Достаточное количество информации от разработчиков онлайн-курсов. Запрашиваемое количество информации полностью отражает цельность курса (от 1 до 10)</label>
                            <input name="podhod"  min='0' max='10' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 10" value="" required="true">
                            </br>
                            <label for="purpose" class="form-label">Критерии оценивания сформированы коректно и полностью удовлетворяют необходимым требованиям оценки (от 1 до 10)
                            </label>
                            <input name="purpose" min='0' max='10' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 10" value="" required="true">
                            </br>
                            <label for="technology" class="form-label">Оставьте свой отзыв о работе платформы и взаимодействия с ней. Подробно укажите пожелания для улучшения качества работы сервиса и процесса разработки онлайн-курсов.</label>
                            <textarea type="text" name="data" class="form-control"  cols="100" rows="7" placeholder="Введите текст"></textarea>
                            </br>
                            <button class="w-100 btn btn-outline-primary btn-lg">Отправить</button>
                        </form>
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