<?php 
session_start();
include ("../database/connect_db.php");
$expert_id 		= $_SESSION['user']['id'];
$kurs_id      	= $_GET['kurs_id'];
$structure    	= $_POST['structure'];
$podhod    		= $_POST['podhod'];
$purpose    	= $_POST['purpose'];
$technology    	= $_POST['technology'];
$health    		= $_POST['health'];

$query = ("INSERT INTO `rating` SET `expert_id` = :expert_id, `kurs_id` = :kurs_id, `structure` = :structure, `podhod` = :podhod, `purpose` = :purpose, `technology` = :technology, `health` = :health");
$params = [
	'expert_id' 	=> $expert_id,
	'kurs_id' 		=> $kurs_id,
	'structure' 	=> $structure,
	'podhod' 		=> $podhod,
	'purpose' 		=> $purpose,
	'technology' 	=> $technology,
	'health' 		=> $health,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
header("Location: /");

