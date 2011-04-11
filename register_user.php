<?php

include ("phpFunctions.php");
//session_start();
$thename = $_POST['newusername'];
$thepass = $_POST['newpassword'];
$confpass = $_POST['confpassword'];
$userPasswordExist = checkUsernameAndPassword($thename, $thepass);
$usernameUsed = checkUsername($thename);

if($userPasswordExist != 0)
{
	//$errorMessage = "1";
	//$errorMessage = 'Existing user? . Please go to the login page';
	header('Location:/~mohit/Blog_App/index.php');
}
else if($usernameUsed != 0)
{
	//$errorMessage = "2";
	//$erorMessage = 'Please choose another user id. This userid is already used.';
	redirect('signup.php');
}
else if($thepass !== $confpass)
{
	redirect('signup.php');
}
else 
{
	createNewUser($_POST['newusername'], $_POST['newpassword']);
	$userRegistered = checkUsernameAndPassword($thename, $thepass);
	if($userRegistered == 0)
	{
		//$errorMessage = "3";
		redirect('signup.php');	
	}
	else
	{	
		//$errorMessage = "4";
		redirect('index.php');
	}
}
?>