<?php
require_once '../database/connect_db.php';
$kurs_id		= $_GET['kurs_id'];
$user_id		= $_GET['user_id'];
$theme_id		= $_GET['theme_id'];
$theme_name 	= $_POST['theme_name'];
$theme_info 	= $_POST['theme_info'];
$text_less 		= $_POST['text_less'];
$quest1 		= $_POST['question1'];
$quest2 		= $_POST['question2'];
$quest3 		= $_POST['question3'];
$quest4 		= $_POST['question4'];
$quest5 		= $_POST['question5'];

$answ11 		= $_POST['answer11'];
$answ12 		= $_POST['answer12'];
$answ13 		= $_POST['answer13'];
$answ14 		= $_POST['answer14'];

$answ21 		= $_POST['answer21'];
$answ22 		= $_POST['answer22'];
$answ23 		= $_POST['answer23'];
$answ24 		= $_POST['answer24'];

$answ31 		= $_POST['answer31'];
$answ32 		= $_POST['answer32'];
$answ33 		= $_POST['answer33'];
$answ34 		= $_POST['answer34'];

$answ41 		= $_POST['answer41'];
$answ42 		= $_POST['answer42'];
$answ43 		= $_POST['answer43'];
$answ44 		= $_POST['answer44'];

$answ51 		= $_POST['answer51'];
$answ52 		= $_POST['answer52'];
$answ53 		= $_POST['answer53'];
$answ54 		= $_POST['answer54'];

$true1 			= $_POST['true1'];
$true2 			= $_POST['true2'];
$true3 			= $_POST['true3'];
$true4 			= $_POST['true4'];
$true5 			= $_POST['true5'];

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
	header("Location: http://edu.rsukosygin.ru/admin/view_kurs.php?kurs_id=$kurs_id&user_id=$user_id");
} else {
	echo "Загрузка не удалась";
}
