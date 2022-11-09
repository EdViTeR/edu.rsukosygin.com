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
                            <label for="structure" type="text"  class="form-label"><b>Удобность</b> использования платформы (от 1 до 10)</label>
                            <input name="structure" min='0' max='10' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 10" value="" required="true">
                            </br>
                            <label for="podhod" class="form-label">Достаточное <b>количество информации</b> от разработчиков онлайн-курсов (от 1 до 10)</label>
                            <input name="podhod"  min='0' max='10' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 10" value="" required="true">
                            </br>
                            <label for="purpose" class="form-label"><b>Критерии</b> оценивания сформированы в соответствии с необходимыми параметрами (от 1 до 10)
                            </label>
                            <input name="purpose" min='0' max='10' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 10" value="" required="true">
                            </br>
                            <label for="technology" class="form-label">Оставьте свой отзыв о работе платформы. Также подробно укажите пожелания для улучшения качества сервиса</label>
                            <input name="technology" min='0' max='15' type="number" class="form-control" id="firstName" placeholder="Введите количество баллов от 0 до 15" value="" required="true">
                            </br>
                            <button class="w-100 btn btn-outline-primary btn-lg">Отправить</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-white border rounded-3">
                        <!-- <img src="/images/я.jpg" alt="Письма мастера дзен" width="160" height="160"> -->
                        <img class="logo_img" src="images/Logo_circl_original.png" width="100" height="100">
                        </br></br>
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>

                        <p>Данная страница создана для улучшения качества оценивания заявок онлайн-курсов РГУ им. А.Н. Косыгина.</p><hr>
                        <p><b>Просим Вас</b> оценить работу сервиса и указать недоработки или положительные моменты работы платформы.</p>
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