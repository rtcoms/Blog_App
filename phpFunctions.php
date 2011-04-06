<?php

$db = '';
$errorMessage='';
function connectToDatabase()
{
	try {
	  $db1 = new PDO("sqlite:blog.db");
	}catch( PDOException $exception ){
	  die($exception->getMessage());
	}
	return $db1;
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function disconnectToDatabase()
{
	try {
	$db1 = null;	
	}catch(PDOException $exception){
		die($exception->getMessage());
	}
	return $db1;
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function checkUsername($uname)
{
	$db=connectToDatabase();
	$query = "SELECT COUNT(*) FROM users WHERE username = '$uname'";
	$result1 = $db->query($query)->fetch();
	$db=disconnectToDatabase();
	return $result1[0];
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function checkUsernameAndPassword($uname, $pword)
{
	$db=connectToDatabase();
	$query = "SELECT COUNT(*) FROM users WHERE username = '$uname' and password = '$pword'";
	$result1 = $db->query($query)->fetch();
	$db=disconnectToDatabase();
	return $result1[0];
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function selectAllPostsOfUser($uname)
{
	$db=connectToDatabase();
	
	//$query = "SELECT * FROM posts WHERE foreign_username = '$uname'";
	//$allPosts1 = $db->query($query);
	$result=$db->query("SELECT post_id, post_title FROM posts WHERE foreign_username = '$uname'");
	// loop over rows of database table
	echo '<table>';
	while($row=$result->fetch(SQLITE_ASSOC)){

	    // fetch current row
		echo '<tr>';
	    	echo '<td>';echo '<b>'.$row[1].'</b>';echo '</td>';
			echo '<td>';
				echo '<a href=view_post.php?postid='.$row[0].'><input type=\'button\' value=\'View\'></a>';
			echo '</td>';
			echo '<td>';
				echo '<a href=edit_post.php><input type=\'button\' value=\'Edit\'></a>';
			echo '</td>';
			echo '<td>';
				echo '<a href=delete_post.php><input type=\'button\' value=\'Delete\'></a>';
			echo '</td>';
		echo '</tr>';

	}
	echo '</table>';
	$db=disconnectToDatabase();
	//return $allPosts1;
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function createNewUser($newuname, $newpword)
{
		$db=connectToDatabase();	
		$query = "INSERT INTO users VALUES ('$newuname', '$newpword')";
		$db->query($query);    
		$db=disconnectToDatabase();
		$errorMessage='You are successfully registered to phpBlog';
		
};
/////////////////////////////////////////////////////////////////////////////////////////////////
function getPostAuthor($postid)
{
	$db=connectToDatabase();	
	$query = "SELECT foreign_username FROM posts WHERE post_id = '$postid'";
	$result1 = $db->query($query)->fetch();    
	$db=disconnectToDatabase();
	return $result1[0];
};
/////////////////////////////////////////////////////////////////////////////////////////////////
function retrievePost($postid)
{
	$db=connectToDatabase();	
	$query = "SELECT * FROM posts WHERE post_id = '$postid'";
	$postDetails = $db->query($query)->fetch(SQLITE_ASSOC);    
	$db=disconnectToDatabase();
	
	return $postDetails;
};
?>