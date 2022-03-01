<?php
require_once '../database/connect_db.php';
$user_id 		= $_GET['user_id'];
$kurs_id		= $_GET['kurs_id'];
$theme_id		= quotemeta($_GET['theme_id']);
$theme_name 	= quotemeta($_POST['theme_name']);
$theme_info 	= quotemeta($_POST['theme_info']);
$text_less 		= quotemeta($_POST['text_less']);
$quest1 		= quotemeta($_POST['question1']);
$quest2 		= quotemeta($_POST['question2']);
$quest3 		= quotemeta($_POST['question3']);
$quest4 		= quotemeta($_POST['question4']);
$quest5 		= quotemeta($_POST['question5']);

$answ11 		= quotemeta($_POST['answer11']);
$answ12 		= quotemeta($_POST['answer12']);
$answ13 		= quotemeta($_POST['answer13']);
$answ14 		= quotemeta($_POST['answer14']);

$answ21 		= quotemeta($_POST['answer21']);
$answ22 		= quotemeta($_POST['answer22']);
$answ23 		= quotemeta($_POST['answer23']);
$answ24 		= quotemeta($_POST['answer24']);

$answ31 		= quotemeta($_POST['answer31']);
$answ32 		= quotemeta($_POST['answer32']);
$answ33 		= quotemeta($_POST['answer33']);
$answ34 		= quotemeta($_POST['answer34']);

$answ41 		= quotemeta($_POST['answer41']);
$answ42 		= quotemeta($_POST['answer42']);
$answ43 		= quotemeta($_POST['answer43']);
$answ44 		= quotemeta($_POST['answer44']);

$answ51 		= quotemeta($_POST['answer51']);
$answ52 		= quotemeta($_POST['answer52']);
$answ53 		= quotemeta($_POST['answer53']);
$answ54 		= quotemeta($_POST['answer54']);

$true1 			= quotemeta($_POST['true1']);
$true2 			= quotemeta($_POST['true2']);
$true3 			= quotemeta($_POST['true3']);
$true4 			= quotemeta($_POST['true4']);
$true5 			= quotemeta($_POST['true5']);

$new_sql = "UPDATE themes SET 
	theme_name 		='$theme_name',
	theme_info		='$theme_info',
	text_less		='$text_less',
	quest1			='$quest1',
	answ11			='$answ11',
	answ12			='$answ12',
	answ13			='$answ13',
	answ14			='$answ14',
	true1			='$true1',
	quest2			='$quest2',
	answ21			='$answ21',
	answ22			='$answ22',
	answ23			='$answ23',
	answ24			='$answ24',
	true2			='$true2',
	quest3			='$quest3',
	answ31			='$answ31',
	answ32			='$answ32',
	answ33			='$answ33',
	answ34			='$answ34',
	true3			='$true3',
	quest4			='$quest4',
	answ41			='$answ41',
	answ42			='$answ42',
	answ43			='$answ43',
	answ44			='$answ44',
	true4			='$true4',
	quest5			='$quest5',
	answ51			='$answ51',
	answ52			='$answ52',
	answ53			='$answ53',
	answ54			='$answ54',
	true5			='$true5'
	WHERE id='$theme_id'";

$result = mysqli_query($link, $new_sql);
if ($result) {
	header("Location: http://edu.rsukosygin.ru/user/access.php?user_id=$user_id");
} else {
	echo "Загрузка не удалась";
}
