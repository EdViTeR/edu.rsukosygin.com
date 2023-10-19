<?php
session_start();
include ("../database/databaseInfo.php");
$user_id = $_SESSION['user']['id'];
$name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'];
$teachers = teacher_role($dbo, 4);
$expert_rating = expert_test($dbo, $user_id);
$rating = marks_2023($dbo);
$photo = view_photo($dbo, $_SESSION['user']['id']);
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
                <a href="user.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
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
                    <!-- Оценки -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm for_table">
                        <p class="h3 mb-3">Оценки</p>
                        <hr class="text-secondary">
						  	<?
						  		$k = 1;
						  		foreach ($expert_rating as $key => $value) {
                                    $kurs = kurs_data_2023($dbo, $value['kurs_id']);
                                    $kurs_name = $kurs['kurs_name'];
                                    echo '<b>' . $kurs_name .'</b></br></br>';
						  			echo '<table class="table table-striped">
						    					<tр align="center">
						    					  <th scope="col" class="col">Актуальность</th>
						    					  <th scope="col" class="col">Структура</th>
						    					  <th scope="col" class="col">Способы</th>
						    					  <th scope="col" class="col">Адаптивность</th>
						    					  <th scope="col" class="col">Значимость</th>
						    					  <th scope="col" class="col">Коммерциализация</th>
                                                  <th scope="col" class="col">Уникальность</th>
						    					</tr>
						  				';
						  			$a = $value["actual"] + $value["structure"] + $value["sposob"] + $value["adaptive"] + $value["health"] + $value["moneyy"] + $value["unique"];
						  			echo '<tr align="center">
    									      <td class="col_10">'. $value["actual"] .'</td>
    									      <td class="col_10">'. $value["structure"] .'</td>
    									      <td class="col_10">'. $value["sposob"] .'</td>
    									      <td class="col_10">'. $value["adaptive"] .'</td>
    									      <td class="col_10">'. $value["health"] .'</td>
                                              <td class="col_10">'. $value["moneyy"] .'</td>
                                              <td class="col_10">'. $value["unique"] .'</td>
    									    </tr>
								        </table>';
                                    echo 'Итоговый балл: ' . $a . '<br><hr>';
						  		}
						  	?>
						  
                        <small class="d-block text-end mt-3">
                            <a href="user.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Назад</a>
                        </small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-5 bg-white border rounded-3">
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
                        <p class="h5 mt-4 mb-4"><?php echo $name?></p>
                        <p>Вы авторизировались как <strong>«Эксперт»</strong>.</p>
                        <a href="marks.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Мои оценки</a>
                        <a href="user.php" class="btn btn-outline-secondary mb-3 me-3" type="button">Назад</a>
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