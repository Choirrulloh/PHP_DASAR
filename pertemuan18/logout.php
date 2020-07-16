<?php
	session_start();
	session_destroy();
	session_unset();

	setcookie('id','',time() - 3600);
	setcookie('key','',time() - 3600);
	$_SESSION = [];
	header("Location: login.php");
	exit;
?>
