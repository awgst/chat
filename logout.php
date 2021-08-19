<?php
	session_start();
	session_unset();
	session_destroy();
	setcookie('value','', time() - 3600);
	setcookie('key','',  time() - 3600);
	header('location: index.php');
?>