<?php
session_start();
require_once '../database/connect_db.php';
include "../database/databaseInfo.php";

$name = mb_strtolower($_POST["search_teacher"]);

function mb_ucfirst($name, $encoding='UTF-8') {
    $name = mb_ereg_replace('^[\ ]+', '', $name);
    $name = mb_strtoupper(mb_substr($name, 0, 1, $encoding), $encoding).
    mb_substr($name, 1, mb_strlen($name), $encoding);
    return $name;
}

$need_name = mb_ucfirst($name);

$teacher_name = teacher_name($dbo, $need_name);
$teacher_first_name = first_name($dbo, $need_name);
$teacher_last_name = last_name($dbo, $need_name);

if (isset($teacher_name) && !empty($teacher_name)) {
    $teacher = $teacher_name;
} elseif (isset($teacher_first_name) && !empty($teacher_first_name)) {
    $teacher = $teacher_first_name;
} elseif (isset($teacher_last_name) && !empty($teacher_last_name)) {
    $teacher = $teacher_last_name;
}

$_SESSION['search_teacher'] = $teacher;
header("Location: add_author.php");