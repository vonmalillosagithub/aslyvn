<?php
	session_start();
	unset($_SESSION['login_id']);
	session_destroy();

	setcookie('logged_in', '', time() - 3600, '/');
	header('location:index.php');
?>