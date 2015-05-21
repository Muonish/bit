<?php
	include('db_recipie.php');
	$dbcnx = loadBase();
	$err = array();
	
	if (isset($_POST['signup'])) {
		$login = quote($_POST['login']);
		$password = quote($_POST['password']);
		
		if (empty($password) || empty($login)) {
			$err[] = "please fill all the fields";
		}
		
		if (!empty($login)) {
			if(userIsExists($dbcnx, $login)) {
				$err[] = "this login has already exists";
			}
		}
		
		if (empty($err)) {
			$password = md5($password);
			insertUser($dbcnx, $login, $email, $password);
			header("Location: login.php");
		}
	}
	
	include("login.html");	
	closeBase($dbcnx);
?>