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
function redirect($url)
{
        header("Location: $url");
        exit();
}
/////////////////////////////////////////////////////////////////////////////////////////////////
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
	while($postDetails=$result->fetch(SQLITE_ASSOC)){

	    // fetch current row
		echo '<tr>';
	    	echo '<td>';
				echo '<h2>'.'<a href=view_post.php?postid='.$postDetails[0].'>'.$postDetails[1].'</a>'.'</h2>';
			echo '</td>';
			
			echo '<td>';
				echo '<h2>'.'<a href=editpost_form.php?postid='.$postDetails[0].'><input type=\'button\' value=\'Edit\'></a>'.'</h2>';
			echo '</td>';
			echo '<td>';
				echo '<h2>'.'<a href=delete_post.php?postid='.$postDetails[0].'><input type=\'button\' value=\'Delete\'></a>'.'</h2>';
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
//////////////////////////////////////////////////////////////////////////////////////////////////
function getPostAuthor($postid)
{
	$db=connectToDatabase();	
	$query = "SELECT foreign_username FROM posts WHERE post_id = '$postid'";
	$result1 = $db->query($query)->fetch();    
	$db=disconnectToDatabase();
	return $result1[0];
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function retrievePost($postid)
{
	$db=connectToDatabase();	
	$query = "SELECT * FROM posts WHERE post_id = '$postid'";
	$postDetails = $db->query($query)->fetch(SQLITE_ASSOC);    
	$db=disconnectToDatabase();
	
	return $postDetails;
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function deletePost($postid1)
{
	$db=connectToDatabase();	
	//$query = "DELETE FROM posts WHERE post_id = '$postid1'";
	//$query1 = $db->prepare("DELETE FROM posts WHERE post_id = $postid1");
	//$query1->execute();
	$db->exec("DELETE FROM posts WHERE post_id = '$postid1'");    
	$db=disconnectToDatabase();
	
	//return $deleteStatus;
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function updatePost($tempid, $temptitle, $tempcontent, $tempcategory)
{
	//USING PDO
	//$db=connectToDatabase();--valid
	//update query	
	//$query = "UPDATE posts SET post_title='$temptitle', post_content='$tempcontent', post_category='$tempcategory' WHERE post_id='$tempid'";
	//$db->exec("UPDATE posts SET post_title='$temptitle', post_content='$tempcontent', foreign_categoryname='$tempcategory' WHERE post_id='$tempid'")--valid;
	//$db=disconnectToDatabase()--valid;
	
	//Using SQLite3
	$dbhandle = new SQLite3("blog.db", $mode=0666, $sqliteerror);
	$tempcontent1 = $dbhandle->escapeString($tempcontent) or die($sqliteerror);
	$temptitle1 = $dbhandle->escapeString($temptitle) or die($sqliteerror);
	
	$dbhandle->exec("UPDATE posts SET post_title='$temptitle1', post_content='$tempcontent1', foreign_categoryname='$tempcategory' WHERE post_id='$tempid'");
	
	$dbhandle->close();
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function retrieveCategories()
{
	$db=connectToDatabase();	
	$query = "SELECT * FROM categories";
	$allCategories = $db->query($query);    
	$db=disconnectToDatabase();
	
	return $allCategories;
};
//////////////////////////////////////////////////////////////////////////////////////////////////
function createPost($temptitle, $tempcontent, $tempcategory, $tempauthor)
{
	
	//$db=connectToDatabase();
	$dbhandle = new SQLite3("blog.db", $mode=0666, $sqliteerror);
	$tempcontent1 = $dbhandle->escapeString($tempcontent) or die($sqliteerror);
	$temptitle1 = $dbhandle->escapeString($temptitle) or die($sqliteerror);
	
	
	//$query = "INSERT INTO posts VALUES (null,'$temptitle', '$tempcontent', '$tempcategory', '$tempauthor')";
	//$db->query($query);
	
	$stmt = $dbhandle->prepare("INSERT INTO posts(post_id, post_title, post_content, foreign_categoryname, foreign_username) VALUES (null,'$temptitle1','$tempcontent1','$tempcategory','$tempauthor')") or die($sqliteerror);
	
	
	$stmt->execute() or die($sqliteerror);
	$dbhandle->close();
	//$db=disconnectToDatabase();
}
//////////////////////////////////////////////////////////////////////////////////////////////////
function retrieveComments($temppostid)
{
	$db=connectToDatabase();	
	$query = "SELECT * FROM comments WHERE foreign_post_id='$temppostid'";
	$allComments = $db->query($query);    
	$db=disconnectToDatabase();
	
	return $allComments;
}
//////////////////////////////////////////////////////////////////////////////////////////////////
function submitComment($tempcommentcontent, $tempcommentbyusername, $tempcommentpostid)
{
	
	
	$dbhandle = new SQLite3("blog.db", $mode=0666, $sqliteerror);
	$tempcommentcontent1 = $dbhandle->escapeString($tempcommentcontent) or die($sqliteerror);
	$tempcommentbyusername1 = $dbhandle->escapeString($tempcommentbyusername) or die($sqliteerror);
	
	$stmt = $dbhandle->prepare("INSERT INTO comments(comment_id, comment_content, comment_by_username, foreign_post_id) VALUES (null,'$tempcommentcontent1','$tempcommentbyusername1','$tempcommentpostid')") or die($sqliteerror);
	
	
	$stmt->execute() or die($sqliteerror);
	$dbhandle->close();
	
}
//////////////////////////////////////////////////////////////////////////////////////////////////
?>