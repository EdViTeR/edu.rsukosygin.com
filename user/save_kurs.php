<?php 
session_start();
require_once '../database/connect_db.php';
$head_id                    = $_SESSION['user']["id"];
$status                     = $_GET["kurs_id"];
$kurs_name           		= $_POST['kurs_name'];
$short_name           		= $_POST['short_name'];
$head_name           		= $_POST['head_name'];
$head_reg       			= $_POST['head_reg'];
$kurs_short_info            = $_POST['kurs_short_info'];
$speaker_name      			= $_POST['speaker_name'];
$short_video_text_speaker   = $_POST['short_video_text_speaker'];
$short_video_text_kurs      = $_POST['short_video_text_kurs'];
$short_video_text_kurs      = $_POST['short_video_text_kurs'];


$query = ("INSERT INTO `teach_kurs` SET `kurs_name` = :kurs_name, `short_name` = :short_name, `head_id` = :head_id, `head_name` = :head_name, `head_reg` = :head_reg, `kurs_short_info` = :kurs_short_info, `speaker_name` = :speaker_name, `short_video_text_speaker` = :short_video_text_speaker, `short_video_text_kurs` = :short_video_text_kurs, `status` = :status");
$params = [
    'kurs_name' 				=> $kurs_name,
    'short_name' 				=> $short_name,
    'head_id' 					=> $head_id,
    'head_name' 				=> $head_name,
    'head_reg' 					=> $head_reg,
    'kurs_short_info' 			=> $kurs_short_info,
    'speaker_name' 				=> $speaker_name,
    'short_video_text_speaker' 	=> $short_video_text_speaker,
    'short_video_text_kurs' 	=> $short_video_text_kurs,
    'status'                    => $status,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
// if ($stmt->execute($params) === true) {
header("Location: access.php");
// } else {
	// echo "Загрузка не удалась";
// }

?>
