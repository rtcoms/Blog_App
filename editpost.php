<?php
	include ("phpFunctions.php");

	session_start();
	
	if(!$_SESSION['username'])
	{
		redirect("/~mohit/Blog_App/index.php");
	}
	else
	{
		$postid = $_POST['postid'];
		$postTitle = $_POST['posttitle'];
		$postContent = $_POST['postcontent'];
		$postCategory = $_POST['postcategory']; 
		$postAuthor = $_SESSION['username'];
		if(!$postid) 
		{
			redirect("error.html");
		}
		updatePost($postid, $postTitle, $postContent, $postCategory);
		
			redirect("view_post.php?postid=$postid");	
	}
?>
