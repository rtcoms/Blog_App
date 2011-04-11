<?php

include ("phpFunctions.php");

$result = checkUsernameAndPassword($_POST["username"], $_POST["password"]);

if($result == 0) //no user exist
{
	//redirect to login page
	redirect('index.php');
}
else //user exist
{
	
	session_register($userParam);
		session_start();
		$_SESSION['username'] = $_POST["username"];
		$_SESSION['password'] = $_POST["password"];	
		//redirect to main page
		redirect('main.php');
	}

?>
<html>
<head>
	
