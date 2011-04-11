<?php
	include ("phpFunctions.php");

	session_start();
	
	if(!isset($_SESSION['username']))
	{
		redirect("index.php");
		$_SESSION['statusmessage'] = "Please login to create post.";
	}
	else
	{
		
		$postTitle = $_POST['posttitle'];
		$postContent = $_POST['postcontent'];
		$postCategory = $_POST['postcategory']; 
		$postAuthor = $_SESSION['username'];
		
		
if(checkEmptyAndNullString($postTitle) || checkEmptyAndNullString($postContent) || checkEmptyAndNullString($postCategory) )
		{
			$_SESSION['statusmessage'] = "All fields are required to create a post"; 
			redirect("createpost_form.php");
		}
		else
		{
			createPost($postTitle, $postContent, $postCategory, $postAuthor);
			$_SESSION['statusmessage'] = "Post created successfully"; 
			redirect("main.php");	
		}
	}
?>
