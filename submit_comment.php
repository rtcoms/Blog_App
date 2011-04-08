<?php
	include ("phpFunctions.php");
		
		$commentPost = $_POST['commentpostid'];
		$commentContent = $_POST['commentcontent'];
		$commentByUsername = $_POST['commentbyusername'];
				
		if(checkEmptyAndNullString($commentContent) || checkEmptyAndNullString($commentByUsername))
		{
			redirect("main.php");	
		}
		else
		{
			submitComment($commentContent, $commentByUsername, $commentPost);
			redirect("view_post.php?postid=$commentPost");	
		}
			
?>
