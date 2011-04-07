<?php
	include ("phpFunctions.php");
		
		$commentPost = $_POST['commentpostid'];
		$commentContent = $_POST['commentcontent'];
		$commentByUsername = $_POST['commentbyusername'];
				
		submitComment($commentContent, $commentByUsername, $commentPost);
		
		redirect("view_post.php?postid=$commentPost");	
	
?>

