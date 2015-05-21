<?php
	include('db_recipie.php');
	$dbcnx = loadBase();
	$err = array();
	
	if (isset($_POST['signup'])) {
		$email = quote($_POST['email']);
		$login = quote($_POST['login']);
		$password = quote($_POST['password']);
		$repassword = quote($_POST['repassword']);
		
		if (empty($email) || empty($password) || empty($login)) {
			$err[] = "please fill all the fields";
		}
		
		if (!preg_match("/[-a-zA-Z0-9_]{3,20}@[-a-zA-Z0-9]{2,64}\.[a-zA-Z\.]{2,9}/", $email)) {
			$err[] = "bad e-mail";
		}
		
		if ($password != $repassword) {
			$err[] = "passwords does not match";
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
	
	include("signup.html");	
	closeBase($dbcnx);
?>