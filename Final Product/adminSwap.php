<?php
	session_start();
	$_SESSION['fName'] = "admin";
	header("location: admin.php");
?>