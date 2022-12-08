<?php 
session_start();
require_once '../database/connect_db.php';
$head_id 					= $_SESSION['user']['id'];
$status 					= $_GET['status'];
$kurs_name           		= quotemeta($_POST['kurs_name']);
$short_name           		= quotemeta($_POST['short_name']);
$head_name           		= quotemeta($_POST['head_name']);
$head_reg       			= quotemeta($_POST['head_reg']);
$kurs_short_info            = quotemeta($_POST['kurs_short_info']);
$speaker_name      			= quotemeta($_POST['speaker_name']);
$short_video_text_speaker   = quotemeta($_POST['short_video_text_speaker']);
$short_video_text_kurs      = quotemeta($_POST['short_video_text_kurs']);

$data = [
	'kurs_name'						=>  $kurs_name,
	'short_name'					=>  $short_name,
	'head_name'						=>  $head_name,
	'head_id'						=>  $head_id,
	'head_reg'						=>  $head_reg,
	'kurs_short_info'				=>  $kurs_short_info,	
	'speaker_name'					=>  $speaker_name,
	'short_video_text_speaker'		=>  $short_video_text_speaker,
	'short_video_text_kurs'			=>  $short_video_text_kurs,
	'status'						=>  $status
];
$sql = "UPDATE teach_kurs SET kurs_name=:kurs_name, short_name=:short_name, head_name=:head_name, head_id=:head_id, head_reg=:head_reg, kurs_short_info=:kurs_short_info, speaker_name=:speaker_name, short_video_text_speaker=:short_video_text_speaker, short_video_text_kurs=:short_video_text_kurs WHERE status=:status";
$stmt= $dbo->prepare($sql);
$stmt->execute($data);
header("Location: access.php");
// $result = mysqli_query($link, $new_sql);
// if ($result) {
// 	header("Location: http://edu.rsukosygin.ru/user/access.php?user_id=$user_id");
// } else {
// 	echo '<!doctype html>
// <html lang="ru">
//     <head>
//         <meta charset="utf-8">Загрузка не удалась';
// }

?>
