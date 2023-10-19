<?php 
session_start();
include ("../database/connect_db.php");
$expert_id 		= $_SESSION['user']['id'];
$kurs_id      	= $_GET['kurs_id'];

$actual    		= $_POST['actual'];
$structure    	= $_POST['structure'];
$sposob    		= $_POST['sposob'];
$adaptive    	= $_POST['adaptive'];
$health    		= $_POST['health'];
$moneyy    		= $_POST['moneyy'];
$unique    		= $_POST['unique'];

$query = ("INSERT INTO `marks_2023` SET `kurs_id` = :kurs_id, `expert_id` = :expert_id, `actual` = :actual, `structure` = :structure, `sposob` = :sposob, `adaptive` = :adaptive, `health` = :health, `moneyy` = :moneyy, `unique` = :unique");
$params = [
	'kurs_id' 		=> $kurs_id,
	'expert_id' 	=> $expert_id,
	'actual' 		=> $actual,
	'structure' 	=> $structure,
	'sposob' 		=> $sposob,
	'adaptive' 		=> $adaptive,
	'health' 		=> $health,
	'moneyy' 		=> $moneyy,
	'unique' 		=> $unique,
];
$stmt = $dbo->prepare($query);
$stmt->execute($params);
header("Location: user.php");

