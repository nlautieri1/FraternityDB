<?php
	session_start();
	$_SESSION['fName'] = $_GET['temp'];
	header("location: admin.php");
?>