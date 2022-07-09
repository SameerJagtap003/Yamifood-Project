<?php 
	
	session_start();
	include('function.php');
	unset($_SESSION['admin_username']);
	// session_destroy();
	redirect('../index.php');
	
	
?>
