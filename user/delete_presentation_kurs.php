<?php
include ("../database/databaseInfo.php");

$theme_id = $_GET['theme_id'];
$kurs_id = $_GET['kurs_id'];

delete_presentation_kurs($dbo, $theme_id);

header("Location: view_kurs.php?kurs_id=$kurs_id");