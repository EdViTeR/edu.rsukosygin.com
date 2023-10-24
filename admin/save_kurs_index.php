<?php 
require_once '../database/connect_db.php';

$head_id        		= $_POST['head_id'];
$name           		= $_POST['name'];
$data           		= $_POST['data'];
$time           		= '72 часа';
$for_whom       		= $_POST['for_whom'];
$why            		= $_POST['why'];
$author         		= $_POST['author'];
$author_info    		= $_POST['author_info'];
$author_photo_first   	= '/images/img_author/' . $_POST['author_photo_first'];
$author_photo_second   	= '/images/img_author/' . $_POST['author_photo_second'];
$video   				= $_POST['video'];

$query = ("INSERT INTO `kurses` SET `head_id` = :head_id, `name` = :name, `data` = :data, `time` = :time, `for_whom` = :for_whom, `why` = :why, `author` = :author, `author_info` = :author_info, `author_photo_first` = :author_photo_first, `author_photo_second` = :author_photo_second, `video` = :video");
$params = [
	'head_id' 				=> $head_id,
	'name' 					=> $name,
	'data' 					=> $data,
	'time' 					=> $time,
	'for_whom' 				=> $for_whom,
	'why' 					=> $why,
	'author' 				=> $author,
	'author_info' 			=> $author_info,
	'author_photo_first' 	=> $author_photo_first,
	'author_photo_second' 	=> $author_photo_second,
	'video' 				=> $video,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
header('Location: add_kurs_index.php');
?>
