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
		
		
if(checkEmptyAndNullString($postTitle) || checkEmptyAndNullString($postContent) || checkEmptyAndNullString($postCategory) )
		{
			redirect("createpost_form.php");	
		}
		else
		{
			createPost($postTitle, $postContent, $postCategory, $postAuthor);
			redirect("main.php");	
		}
	}
?>
