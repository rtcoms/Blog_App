<?php
	session_start();
	if($_SESSION['username'])
	{
		unset($_SESSION['password']);
		$uname = $_SESSION['username'];
		unset($_SESSION['username']);
		unset($userParam);
		unset($passParam);
		session_unset();
		session_destroy();
		$_SESSION = array();
		
	
	if(!$_SESSION['username'])
	{
		header("Location: index.php?uname1=$uname");
	}
}
?>

