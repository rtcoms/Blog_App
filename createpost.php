<?php
	include ("phpFunctions.php");

	session_start();
	
	if(!$_SESSION['username'])
	{
		redirect("index.php");
	}
	else
	{
		
		$postTitle = $_POST['posttitle'];
		$postContent = $_POST['postcontent'];
		$postCategory = $_POST['postcategory']; 
		$postAuthor = $_SESSION['username'];
		
		createPost($postTitle, $postContent, $postCategory, $postAuthor);
		
			redirect("main.php");	
	}
?>