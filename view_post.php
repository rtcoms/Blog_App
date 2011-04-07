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
	
			<div id="outline">
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

				<div id="text">
					<?php

						$postDetails = retrievePost($_GET['postid']);

						echo '<h2>'.$postDetails[1].'</h2>';echo '<br />';
						echo '<pre>'.$postDetails[2].'</pre>';echo '<br />';echo '<br />';
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
						}
					?>
				</div>

			</div>
	
</body>
</html>