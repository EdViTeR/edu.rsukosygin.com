<?php 
require_once '../database/connect_db.php';
$kurs_id 					= $_GET['kurs_id'];
$kurs_name           		= $_POST['kurs_name'];
$short_name           		= $_POST['short_name'];
$head_name           		= $_POST['head_name'];
$head_reg       			= $_POST['head_reg'];
$kurs_short_info            = $_POST['kurs_short_info'];
$speaker_name      			= $_POST['speaker_name'];
$short_video_text_speaker   = $_POST['short_video_text_speaker'];
$short_video_text_kurs      = $_POST['short_video_text_kurs'];

$new_sql = "UPDATE teach_kurs SET 
	kurs_name						=  '$kurs_name',
	short_name						=  '$short_name',
	head_name						=  '$head_name',
	head_reg						=  '$head_reg',
	kurs_short_info					=  '$kurs_short_info',	
	speaker_name					=  '$speaker_name',
	short_video_text_speaker		=  '$short_video_text_speaker',
	short_video_text_kurs			=  '$short_video_text_kurs'
WHERE id='$kurs_id'";
$result = mysqli_query($link, $new_sql);
if ($result) {
	header("Location: http://edu.rsukosygin.ru/admin/view_kurs.php?kurs_id=$kurs_id");
} else {
	echo '<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">Загрузка не удалась';
}

?>
