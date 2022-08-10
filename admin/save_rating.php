<?php

session_start();
include ("../database/databaseInfo.php");

$rating = rating($dbo);

foreach ($rating as $key => $value) {
	$kurs_id = $value['id'];
	$kurs_data = kurs_data($dbo, $kurs_id);
	$user_id = $kurs_data['user_id'];
	$user_info = teacher($dbo, $user_id);
	$kurs_name = $kurs_data['kurs_name'];
	$username = $user_info['first_name'] . ' ' . $user_info['name'] . ' ' . $user_info['last_name'];
	$data[] = $username . '|' . $kurs_name . '|';
}
	var_dump($data); die;

