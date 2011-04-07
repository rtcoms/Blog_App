<?php
session_start();
include ("phpFunctions.php");
if(!$_SESSION['username'])
{
	redirect('index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Adobe GoLive" />
		<title>PhpBlog</title>
		<link rel="stylesheet" type="text/css" href="design.css" />
	</head>
<?php

echo '<body>';

if($_SESSION['username'])
{
	
		
		echo '<div id="outline">';
			echo '<div id="title">';
			echo '<h3>My Blog.</h3>';
		echo '</div>';
			
		echo '<div id="caption">';
			echo "welcome "."<b>".$_SESSION['username']."</b>";	
			echo '<br />';
			echo '<a href="createpost_form.php">Create new post</a>';
			echo '<br />';
			echo '<a href="logout.php">Log out</a>';
		echo '</div>';
	
		echo '<div id="text">';
			echo '<h5>Posts Created by You</h5>';
			echo '<br />';
			//echo $_SESSION['username'];
			selectAllPostsOfUser($_SESSION['username']);
			//$post  = $allPostsOfUser->fetch();
			//echo post[2];
		echo '</div>';
			
		//echo '</div>';
		
	
}
echo '</body>';
?>

</html>
