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

$present_name 	= '';
$present_path 	= '';

$data = [
     'id' 			=> 	$theme_id,
     'kurs_id'		=>	$kurs_id,
     'user_id'		=>	$user_id,
     'theme_name'	=>	$theme_name,
     'theme_info'	=>	$theme_info,
     'text_less'	=>	$text_less,
     'quest1'		=>	$quest1,
     'answ11'		=>	$answ11,
     'answ12'		=>	$answ12,
     'answ13'		=>	$answ13,
     'answ14'		=>	$answ14,
     'true1'		=>	$true1,
     'quest2'		=>	$quest2,
     'answ21'		=>	$answ21,
     'answ22'		=>	$answ22,
     'answ23'		=>	$answ23,
     'answ24' 		=>  $answ24,
     'true2'		=>	$true2,
     'quest3'		=>	$quest3,
     'answ31'		=>	$answ31,
     'answ32'		=>	$answ32,
     'answ33'		=>	$answ33,
     'answ34'		=>	$answ34,
     'true3'		=>	$true3,
     'quest4'		=>	$quest4,
     'answ41'		=>	$answ41,
     'answ42'		=>	$answ42,
     'answ43'		=>	$answ43,
     'answ44' 		=>  $answ44,
     'true4'		=>	$true4,
     'quest5'		=>	$quest5,
     'answ51'		=>	$answ51,
     'answ52'		=>	$answ52,
     'answ53'		=>	$answ53,
     'answ54' 		=>  $answ54,
     'true5'		=>	$true5,
     'present_name'	=>	$present_name,
     'present_path'	=>	$present_path,
];

$sql = "UPDATE themes SET kurs_id=:kurs_id, user_id=:user_id, theme_name=:theme_name, theme_info=:theme_info, text_less=:text_less, quest1=:quest1, answ11=:answ11, answ12=:answ12, answ13=:answ13, answ14=:answ14, true1=:true1, quest2=:quest2, answ21=:answ21, answ22=:answ22, answ23=:answ23, answ24=:answ24, true2=:true2, quest3=:quest3, answ31=:answ31, answ32=:answ32, answ33=:answ33, answ34=:answ34, true3=:true3, quest4=:quest4, answ41=:answ41, answ42=:answ42, answ43=:answ43, answ44=:answ44, true4=:true4, quest5=:quest5, answ51=:answ51, answ52=:answ52, answ53=:answ53, answ54=:answ54, true5=:true5, present_name=:present_name, present_path=:present_path, WHERE id=:theme_id";

$statement = $dbo->prepare($sql);

$statement->bindParam(':id', $data['id'], PDO::PARAM_INT);
$statement->bindParam(':kurs_id', $data['kurs_id']);
$statement->bindParam(':user_id', $data['user_id']);
$statement->bindParam(':theme_name', $data['theme_name']);
$statement->bindParam(':theme_info', $data['theme_info']);
$statement->bindParam(':text_less', $data['text_less']);
$statement->bindParam(':quest1', $data['quest1']);
$statement->bindParam(':answ11', $data['answ11']);
$statement->bindParam(':answ12', $data['answ12']);
$statement->bindParam(':answ13', $data['answ13']);
$statement->bindParam(':answ14', $data['answ14']);
$statement->bindParam(':true1', $data['true1']);
$statement->bindParam(':quest2', $data['quest2']);
$statement->bindParam(':answ21', $data['answ21']);
$statement->bindParam(':answ22', $data['answ22']);
$statement->bindParam(':answ23', $data['answ23']);
$statement->bindParam(':answ24', $data['answ24']);
$statement->bindParam(':true2', $data['true2']);
$statement->bindParam(':quest3', $data['quest3']);
$statement->bindParam(':answ31', $data['answ31']);
$statement->bindParam(':answ32', $data['answ32']);
$statement->bindParam(':answ33', $data['answ33']);
$statement->bindParam(':answ34', $data['answ34']);
$statement->bindParam(':true3', $data['true3']);
$statement->bindParam(':quest4', $data['quest4']);
$statement->bindParam(':answ41', $data['answ41']);
$statement->bindParam(':answ42', $data['answ42']);
$statement->bindParam(':answ43', $data['answ43']);
$statement->bindParam(':answ44', $data['answ44']);
$statement->bindParam(':true4', $data['true4']);
$statement->bindParam(':quest5', $data['quest5']);
$statement->bindParam(':answ51', $data['answ51']);
$statement->bindParam(':answ52', $data['answ52']);
$statement->bindParam(':answ53', $data['answ53']);
$statement->bindParam(':answ54', $data['answ54']);
$statement->bindParam(':true5', $data['true5']);
$statement->bindParam(':present_name', $data['present_name']);
$statement->bindParam(':present_path', $data['present_path']);

if($statement->execute()) {
     header("Location: http://edu.rsukosygin.ru/admin/view_kurs.php?kurs_id=$kurs_id&user_id=$user_id");
}


