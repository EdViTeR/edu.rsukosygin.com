<?php 
require_once '../database/connect_db.php';

$kurs_id        		= $_POST['kurs_id'];
$name           		= $_POST['name'];
$data           		= $_POST['data'];


$query = ("INSERT INTO `lection_for_site` SET `kurs_id` = :kurs_id, `name` = :name");
$params = [
	'kurs_id' 				=> $kurs_id,
	'name' 					=> $name,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
header('Location: add_lection_index.php');
?>
