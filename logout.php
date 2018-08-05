<?php
	session_start();
	session_destroy();
	header("Location: login.php");
?>

<!-- loading -->

<script src="js/pace.min.js"></script>
<link rel="stylesheet" href="/css/pace-theme-minimal.css">
<!--end load-->