<?php 
require_once '../database/connect_db.php';
$user_id 					= $_GET['user_id'];
$kurs_name           		= $_POST['kurs_name'];
$short_name           		= $_POST['short_name'];
$head_name           		= $_POST['head_name'];
$head_reg       			= $_POST['head_reg'];
$kurs_short_info            = $_POST['kurs_short_info'];
$speaker_name      			= $_POST['speaker_name'];
$short_video_text_speaker   = $_POST['short_video_text_speaker'];
$short_video_text_kurs      = $_POST['short_video_text_kurs'];
$new_sql="INSERT INTO teach_kurs (kurs_name, short_name, head_id, head_name, head_reg, kurs_short_info, speaker_name, short_video_text_speaker, short_video_text_kurs) VALUES('$kurs_name', '$short_name', '$user_id',  '$head_name', '$head_reg', '$kurs_short_info', '$speaker_name', '$short_video_text_speaker', '$short_video_text_kurs')";
$result = mysqli_query($link, $new_sql);
if ($result) {
	header("Location: http://edu.rsukosygin.ru/user/access.php?user_id=$user_id");
} else {
	echo "Загрузка не удалась";
}

?>
