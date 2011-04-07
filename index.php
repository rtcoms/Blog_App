<?php
 include("phpFunctions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Adobe GoLive" />
		<title>Sign up for blogging application</title>
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
					echo "<br />";
					echo '<a href="signup.php">'.'Sign up'.'</a>';
					echo  $errorMessage;
				?>
			</div>
			
			<div id="text">
				LoginIn :
				<form action="check_login.php" method="post">
					<table>
						<tr>
						<td>Username :</td> <td><input type="text" name="username"></input></td>
						</tr>
						<td>Password  : </td><td><input type="password" name="password"></input></td>
						<tr>
							<td colspan="2"><input type="Submit" name="Submit" value="Submit"></td>
						</tr>
					</table>
				</form>
				
			</div>
			
		</div>
		
	</body>

</html>
