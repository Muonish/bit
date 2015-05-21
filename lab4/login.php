<?php
	include('db_recipie.php');
	$dbcnx = loadBase();
	$err = array();
	
	if (isset($_POST['log_in'])) {
		$login = quote($_POST['login']);
		$password = quote($_POST['password']);
		
		if(!empty($login) && !empty($password)){
			$userinfo = getUser($dbcnx, $login, $password);
			if (empty($userinfo)) {
				$err[] = "invalid username or password";
			} else {
				$_SESSION['uid'] = $userinfo['user_id'];
				$_SESSION['ulogin'] = $userinfo['login'];
				$_SESSION['isadmin'] = $userinfo['is_admin'];

				header("Location: index.php");
			}
		} else {
			$err[] = "enter username AND password";
		}
	
	}

	include("login.html");	
	closeBase($dbcnx);
?>