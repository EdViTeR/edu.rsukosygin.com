<?php
$firstName = htmlspecialchars($_POST['firstName']);
$name = htmlspecialchars($_POST['name']);
$lastName = htmlspecialchars($_POST['lastName']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$repeat_password = htmlspecialchars($_POST['repeat_password']);
$role = htmlspecialchars($_POST['role']);
var_dump($role); die;
?>