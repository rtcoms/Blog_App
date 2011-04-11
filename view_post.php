<?php
	session_start();
	include ("phpFunctions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>phpBlog</title>

    <!-- Framework CSS -->
    <link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
    <!--[if lt IE 8]><link rel="stylesheet" href="../blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->

    <!-- Import fancy-type plugin for the sample page. -->
    <link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
  </head>
  <body>
    <div class="container">
      <h1>My Blog.</h1>
      <h2 class="alt">This is a blog created in PHP/SQLite3.</h2>
      <hr>

      <div class="span-24 ">
        this is place for status messages
      </div>
      <br />
	  <br />

      <hr>
	   <div class="span-5">
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
				
			?>
	   </div>
	
      <div class="span-18 last border-left">
			<?php

				$postDetails = retrievePost($_GET['postid']);

				echo '<h2>'.$postDetails[1].'</h2>';echo '<br />';
				echo '<pre>';echo nl2br(stripslashes($postDetails[2]));echo '</pre>';echo '<br />';echo '<br />';
				echo '<pre><b>Category :</b>'.$postDetails[3].'</pre>';
				echo '<br />';
				echo 'Written by :  '.'<b>'.$postDetails[4].'</b>';	
				echo '<br />';	
				echo '<div class="span-5">';
				
				if($_SESSION['username'] == $postDetails[4])
				{
					echo '<table>';
					
					echo '<tr>';
					    	
						echo '<td  class="large tdbgcolor">';
							echo '<a href=editpost_form.php?postid='.$postDetails[0].'><input type=\'button\' value=\'Edit\'></a>';
						echo '</td>';
						echo '<td  class="large tdbgcolor">';
							echo '<a href=delete_post.php?postid='.$postDetails[0].'><input type=\'button\' value=\'Delete\'></a>';
						echo '</td>';
					echo '</tr>';

					echo '</table>';
					
					echo '<br />';
					
					}
					echo '</div>';
					?>
					<hr>
					<br />
					<br />
					<b>Comments for the above posts :</b><br />
					<div id="comments" class="wordwrap span-11">
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
							<td colspan="2" class="large tdbgcolor">Your Comment :</td>
						</tr>
						<tr>
							<td colspan="2"  class="large tdbgcolor"><textarea cols="40" rows="5" name="commentcontent" wrap="hard"></textarea></td>
						</tr>
						<tr>
							<td  class="large tdbgcolor">Your name :</td>
							<td  class="large tdbgcolor"><input tupe="textbox" name="commentbyusername" size="39"></td>
						</tr>
						<tr>
							<td colspan="2"  class="large tdbgcolor"><input type="Submit" action="submit" value="submit"></td>
						</tr>
					</table>
				</form>
      </div>
      <hr>
    </div>

  </body>
</html>
