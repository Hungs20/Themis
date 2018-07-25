<?php
	session_start();
	if (!isset($_SESSION['tuser'])) header("Location: /login.php");
	else {
		$user['id'] = $_SESSION['tid'];
		$user['username'] = $_SESSION['tuser'];
		$user['password'] = $_SESSION['tpass'];
	}
?>
