<?php 
	
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['qwe']);
	header('Location: index.php');

?>