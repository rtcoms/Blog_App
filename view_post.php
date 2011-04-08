<?php
	session_start();
	include ("phpFunctions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Adobe GoLive" />
	<title>PhpBlog</title>
	<link rel="stylesheet" type="text/css" href="design.css" />
</head>
<body>
	
			<div id="outline" >
				<div id="title">
					<h3>My Blog.</h3>
				</div>
				<div id="caption">
					<?php
						if($_GET['uname1'] != '')
						{
							//echo $_SESSION['username'];
							echo "<b>".$_GET['uname1']."</b>".", you are logged out from the blogging application";	
						}
						
						if(!$_SESSION['username'])
						{		
							echo "welcome "."Guest"."</b>";	
							echo '<br />';
							echo "<br />";
							echo '<a href="signup.php">'.'Sign up'.'</a>';
						}
						else
						{
							echo "welcome "."<b>".$_SESSION['username']."</b>";	
							echo '<br />';
							echo '<br />';
							echo '<a href="main.php">Main page</a>';
							echo '<br />';
							echo '<a href="logout.php">Log out</a>';
						}
						//echo  $errorMessage;
					?>
				</div>

				<div id="text" class="clearfix">
					<?php

						$postDetails = retrievePost($_GET['postid']);

						echo '<h2>'.$postDetails[1].'</h2>';echo '<br />';
						echo '<pre>';echo nl2br(stripslashes($postDetails[2]));echo '</pre>';echo '<br />';echo '<br />';
						echo '<pre><b>Category :</b>'.$postDetails[3].'</pre>';echo '<br />';
						echo '<br />';echo '<br />';echo '<br />';
						echo 'Written by :  '.'<b>'.$postDetails[4].'</b>';		
						
						if($_SESSION['username'] == $postDetails[4])
						{
							echo '<table>';
							
							echo '<tr>';
							    	
								echo '<td>';
									echo '<a href=editpost_form.php?postid='.$postDetails[0].'><input type=\'button\' value=\'Edit\'></a>';
								echo '</td>';
								echo '<td>';
									echo '<a href=delete_post.php?postid='.$postDetails[0].'><input type=\'button\' value=\'Delete\'></a>';
								echo '</td>';
							echo '</tr>';

							echo '</table>';
							
							echo '<br />';
							
							}
							?>
							<br />
							<br />
							<b>Comments for the above posts :</b>
							<div id="comments" class="wordwrap">
							<?php
							$postComments = retrieveComments($_GET['postid']);
							while($commentDetails=$postComments->fetch(SQLITE_BOTH))
							{
									echo '<pre>'.$commentDetails[1].'</pre>';
									echo '<br />';
									echo 'by:<b>'.$commentDetails[2].'</b>';
									echo '<hr />';
							}	
							
						
						?>
						<form action="submit_comment.php" method="post">
							<?php
								echo '<input type=\'hidden\' name=\'commentpostid\' value=\''.$_GET['postid'].'\'</input>';
							?>
							<table>
								<tr>
									<td colspan="2">Your Comment :</td>
								</tr>
								<tr>
									<td colspan="2"><textarea cols="40" rows="10" name="commentcontent" wrap="hard"></textarea></td>
								</tr>
								<tr>
									<td>Your name :</td>
									<td><input tupe="textbox" name="commentbyusername" size="39"></td>
								</tr>
								<tr>
									<td colspan="2"><input type="Submit" action="submit" value="submit"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>

			</div>
	
</body>
</html>