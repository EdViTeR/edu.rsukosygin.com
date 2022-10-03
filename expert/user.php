<?php
    session_start();
    include ("../database/databaseInfo.php");
    $data = kurses($dbo);
    $users = users($dbo);
    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }
    $user_id = $_SESSION['user']['id'];
    $rating = expert_rating($dbo, $user_id);
    if (isset($rating) && !empty($rating)) {
        foreach ($rating as $key => $value) {
            $kurs_id_all[] = $value['kurs_id'];
        }
    }
    $name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'];
    $photo = view_photo($dbo, $_SESSION['user']['id']);
    $get_kurs = get_kurs_info($dbo);
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Личный кабинет</title>
        <link rel="stylesheet" href="../style.css">
        <link type="image/x-icon" href="../images/favicon.ico" rel="shortcut icon">
        <link type="Image/x-icon" href="../images/favicon.ico" rel="icon">
    </head>
    <body class="body-home">

        <!-- Шапка -->
        <div class="container pt-4">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="../images/rsu_logo.svg" alt="" width="200">
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
                    <!-- Онлайн-курсы -->
                    <div class="mb-4 p-5 bg-body rounded shadow-sm">
                        <p class="h3 mb-3">Список заявок</p>
                        <hr class="text-secondary">
                            <?  
                            foreach ($get_kurs as $key => $value) {
                                $kurs_id = $value['id'];
                                if (isset($kurs_id_all) && in_array($kurs_id, $kurs_id_all)) {
                                    $status = '<b class="status_access">Оценен</b>';
                                } else {
                                    $status = '<b class="status_not_access">Не оценен</b>';
                                }
                            	$user_id = $value['user_id'];
                            	$user_data = user_data($dbo, $user_id);
                            	$username = $user_data["first_name"] . ' ' .  $user_data['name'] . ' ' . $user_data['last_name'];
	                            $kurs_id = $value['id'];
	                            $kurs_name = $value['kurs_name'];
	                            echo '<div class="d-flex text-muted pt-3">
	                                    <a href="view_order.php?kurs_id=' . $kurs_id . '" ><svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
	                                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
	                                    <div class="d-flex justify-content-between">
	                                        <strong class="text-gray-dark">' . $kurs_name . '</strong>
                                            <a href="view_order.php?kurs_id=' . $kurs_id . '">Посмотреть</a>
	                                    </div>
	                                        <span class="d-block">' . $username . '&nbsp&nbsp&nbsp&nbsp&nbsp'.$status .'</b></span>
	                                    </div>
	                                </div>';
                            }?>
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