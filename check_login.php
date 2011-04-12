<?php
session_start();
include ("phpFunctions.php");

if(isset($_POST["username"]) && isset($_POST["password"]))
{
	$result = checkUsernameAndPassword($_POST["username"], $_POST["password"]);
}
if($result == 0) //no user exist
{
	
	//redirect to login page
	
	$_SESSION['login?'] = 0;
	redirect('index.php');
	
}
else //user exist
{
		$_SESSION['username'] = $_POST["username"];
		$_SESSION['password'] = $_POST["password"];	
		//redirect to main page
		$_SESSION['statusmessage'] = "Logged in successfully";
		$_SESSION['login?'] = 0;
		redirect('main.php');
	}

?>
<html>
<head>
	
