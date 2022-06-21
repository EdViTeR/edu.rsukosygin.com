<?php 
	
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['qwe']);
	unset($_SESSION['user_info']);
	header('Location: index.php');

?>