<?php
	include("db_recipie.php");
	
	unset($_SESSION['uid']);
	unset($_SESSION['ulogin']);
	unset($_SESSION['isadmin']);
	
	header("Location: index.php");
?>