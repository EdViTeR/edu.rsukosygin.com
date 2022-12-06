<?php 
	
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['qwe']);
	unset($_SESSION['user_info']);
	unset($_SESSION['kurs_id']);
	header('Location: index.php');

?>