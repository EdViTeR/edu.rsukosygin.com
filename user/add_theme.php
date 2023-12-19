<?php
    include ("../database/databaseInfo.php");
	$user_id = $_GET['user_id'];
	$kurs_id = $_GET['kurs_id'];
	$data = kurs($dbo, $kurs_id);
	foreach ($data as $key => $value) {
		$name = $value[1];
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
                </div>
            </div>
        </div>
        <div class="container-fluid page">
        <div class="container">
                    <h3 class="title-article">
                        Добавление темы к курсу:
                    </h3>
                    <h3 class="title-article">
                        <?php echo $name;?>
                    </h3></br>
            <?php echo '<form method="POST" action="save_theme.php?user_id=' . $user_id . '&kurs_id=' . $kurs_id . '" enctype="multipart/form-data">'?>
                <p><h4>Название темы</h4></p>
                    <textarea type="text" name="theme_name" class="form-control" cols="100" rows="3" placeholder="Укажите название темы лекции" required></textarea>
                </br></br>
                <p><h4>Краткая аннотация по теме лекции</h4></p>
                    <textarea type="text" name="theme_info" class="form-control"  cols="100" rows="3" placeholder="В этом поле укажите краткую аннотацию по теме лекции объемом не более 1000 печатных знаков" maxlength=1000 required></textarea>
                </br></br>
                <p><h4>Текст лекции</h4></p>
                    <textarea type="text" name="text_less" class="form-control"  cols="100" rows="3" placeholder="В этом поле укажите текст выступления спикера, полную речь по теме лекции (от 6 до 10 минут)" required></textarea>
                </br></br>
                <p><h4>Мини-тест лекции (от 3 до 5 вопросов)</h4>
                <h4><u><i>необходимо указать правильный ответ</h4></u></i></p>
                </br>
                <p><h4>Вопрос №1</h4></p>
    				<textarea name="question1" class="form-control" cols="100" rows="2" placeholder="Текст вопроса №1?" required></textarea>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>1.</h6>
                        </div>
                        <div class="col">
    				    <input for="check11" size="50" for="check11" name="answer11" class="form-control" placeholder="Введите вариант ответа на вопрос №1" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>2.</h6>
                        </div>
                        <div class="col">
    				    <input size="50" for="check12" name="answer12" class="form-control" placeholder="Введите вариант ответа на вопрос №1" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>3.</h6>
                        </div>
                        <div class="col">
    				    <input size="50" for="check13" name="answer13" class="form-control" placeholder="Введите вариант ответа на вопрос №1" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>4.</h6>
                        </div>
                        <div class="col">
    				    <input size="50" for="check14" name="answer14" class="form-control" placeholder="Введите вариант ответа на вопрос №1" required></input>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h4>Правильный ответ: </h4>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true1" placeholder="Введите номер правильного ответа ответа на вопрос №1" required></input>
                        </div>
                    </div>
    				</br>
    				</br></br>
                <p><h4>Вопрос №2</h4></p>
    				<textarea name="question2"  cols="100" rows="2" class="form-control" placeholder="Текст вопроса №2?" required></textarea>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>1.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check21" name="answer21" class="form-control" placeholder="Введите вариант ответа на вопрос №2" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>4.</h6>
                       </div>
                       <div class="col">
    				        <input size="50" for="check22" name="answer22" class="form-control" placeholder="Введите вариант ответа на вопрос №2" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>4.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check23" name="answer23" class="form-control" placeholder="Введите вариант ответа на вопрос №2" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>4.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check24" name="answer24" class="form-control" placeholder="Введите вариант ответа на вопрос №2" required></input>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h4>Правильный ответ: </h4>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true2" placeholder="Введите номер правильного ответа ответа на вопрос №2" required></input>
                        </div>
                    </div>
    				</br>
    				</br></br>
                <p><h4>Вопрос №3</h4></p>
    				<textarea name="question3" class="form-control" cols="100" rows="2" placeholder="Текст вопроса №3?" required></textarea>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>1.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check31" name="answer31" class="form-control" placeholder="Введите вариант ответа на вопрос №3" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	       <h6>2.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check32" name="answer32" class="form-control" placeholder="Введите вариант ответа на вопрос №3" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>3.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check33" name="answer33" class="form-control" placeholder="Введите вариант ответа на вопрос №3" required></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>4.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check34" name="answer34" class="form-control" placeholder="Введите вариант ответа на вопрос №3" required></input>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h4>Правильный ответ: </h4>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true3" placeholder="Введите номер правильного ответа ответа на вопрос №3" required></input>
                        </div>
                    </div>
    				</br>
    				</br></br>
                <p><h4>Вопрос №4</h4></p>
    				<textarea name="question4" class="form-control" cols="100" rows="2" placeholder="Текст вопроса №4?"></textarea>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>1.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check41" name="answer41" class="form-control" placeholder="Введите вариант ответа на вопрос №4"></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>2.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check42" name="answer42" class="form-control" placeholder="Введите вариант ответа на вопрос №4"></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>3.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check43" name="answer43" class="form-control" placeholder="Введите вариант ответа на вопрос №4"></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>4.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check44" name="answer44" class="form-control" placeholder="Введите вариант ответа на вопрос №4"></input>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h4>Правильный ответ: </h4>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true4" placeholder="Введите номер правильного ответа ответа на вопрос №4"></input>
                        </div>
                    </div>
    				</br></br>
                <p><h4>Вопрос №5</h4></p>
    				<textarea name="question5" class="form-control" cols="100" rows="2" placeholder="Текст вопроса №5?"></textarea>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>1.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check51" name="answer51" class="form-control" placeholder="Введите вариант ответа на вопрос №5"></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>2.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check52" name="answer52" class="form-control" placeholder="Введите вариант ответа на вопрос №5"></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>3.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check53" name="answer53" class="form-control" placeholder="Введите вариант ответа на вопрос №5"></input>
                        </div>
                    </div>
    				</br>
                	</br>
                    <div class="row">
                        <div class="col-1" align="right">
                	        <h6>4.</h6>
                        </div>
                        <div class="col">
    				        <input size="50" for="check54" name="answer54" class="form-control" placeholder="Введите вариант ответа на вопрос №5"></input>
                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-3" align="left">
                            <h4>Правильный ответ: </h4>
                        </div>
                        <div class="col">
                            <input type="number" min=0 max=4 class="form-control" name="true5" placeholder="Введите номер правильного ответа ответа на вопрос №5"></input>
                        </div>
                    </div>
    				</br></br>
                <?php echo '<a href="user.php?user_id='. $user_id . '"class="btn btn-outline-primary me-2">Вернуться</a>'?>
                <input type="submit" name="submit_image" value="Добавить тему" class="btn btn-outline-primary me-2">
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
                <p class="text-center text-muted border-top pt-3 ">&copy; 2023 РГУ им. А.Н. Косыгина</p>
            </footer>
        </div>

    </body>
</html>
