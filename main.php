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
		<div class="error">
        <?php
        	echo $_SESSION['statusmessage'];
        ?>
		</div>
      </div>
	
      <hr>

      
	   <div class="span-5 ">
			<br />
	        <h3>Main Menu</h3>   
			<?php
				echo "Hi "."<b>".$_SESSION['username']."</b>,";	
				echo '<br />';
				echo "<ul>";
				echo '<a href="createpost_form.php">Create new post</a>';
				echo '<br />';
				echo '<a href="logout.php">Log out</a>';
				echo "</ul>";
			?>
	   </div>
	
      <div class="span-18 last border-left">
		<h2>My Blog.</h2>
       <?php
       	echo '<h5>Posts Created by You</h5>';
		echo '<br />';
		//echo $_SESSION['username'];
		selectAllPostsOfUser($_SESSION['username']);
		//$post  = $allPostsOfUser->fetch();
		//echo post[2];
       ?>
      </div>

      <hr>
    </div>
  </body>
</html>
