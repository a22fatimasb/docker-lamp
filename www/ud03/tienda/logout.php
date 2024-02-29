<?php
	session_start();    
	$_SESSION = array();
	session_destroy();	
	setcookie('usuario', 123, time() - 1000); 
	header("Location: index.php");
?>
