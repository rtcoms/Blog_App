<?php

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

					<h1>This is PHP Exercise Blog web application.</h1>
					<?php
						if($_GET['uname1'] != '')
						{
							//echo $_SESSION['username'];
							echo "<b>".$_GET['uname1']."</b>".", you are logged out from the blogging application";	
						}
						echo "<br />";
						echo '<a href="signup.php">'.'Sign up'.'</a>';
						echo  $errorMessage;
					?>
				</div>

				<div id="text">
					<?php

						$postDetails = retrievePost($_GET['postid']);

						echo '<h2>'.$postDetails[1].'</h2>';echo '<br />';
						echo $postDetails[2];echo '<br />';
						echo $postDetails[3];echo '<br />';
						echo '<br />';echo '<br />';echo '<br />';
						echo 'Written by :  '.'<b>'.$postDetails[4].'</b>';;
					?>
				</div>

			</div>
	
</body>
</html>