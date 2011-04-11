<?php
	include ("phpFunctions.php");

	session_start();
	
	if(!$_SESSION['username'])
	{
		redirect("index.php");
		$_SESSION['statusmessage'] = "Please login to edit the post";
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
					$_SESSION['statusmessage'] = "All fields are required";
				}
				else
				{
					updatePost($postid, $postTitle, $postContent, $postCategory);
					$_SESSION['statusmessage'] = "Post edited successfully";
					redirect("view_post.php?postid=$postid");	
				}	
	}
?>
