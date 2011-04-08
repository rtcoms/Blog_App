<?php
	include ("phpFunctions.php");

	session_start();
	
	if(!$_SESSION['username'])
	{
		redirect("index.php");
	}
	else
	{
		$postid = $_POST['postid'];
		$postTitle = $_POST['posttitle'];
		$postContent = $_POST['postcontent'];
		$postCategory = $_POST['postcategory']; 
		$postAuthor = $_SESSION['username'];
		
		if(checkEmptyAndNullString($postTitle) || checkEmptyAndNullString($postContent) || checkEmptyAndNullString($postCategory) )
				{
					redirect("editpost_form.php?postid=$postid");	
				}
				else
				{
					updatePost($postid, $postTitle, $postContent, $postCategory);
					redirect("view_post.php?postid=$postid");	
				}
		
		
			
	}
?>
