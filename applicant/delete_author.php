<?php 
require_once '../database/connect_db.php';

$kurs_id = $_GET['kurs_id'];
$user_id = $_GET['author_id'];

$query = 'DELETE FROM author WHERE user_id = :user_id AND kurs_id = :kurs_id';
$params = [
    'user_id' 		=> $user_id,
    'kurs_id' 		=> $kurs_id,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
header("Location: view_kurs.php?kurs_id=$kurs_id");



