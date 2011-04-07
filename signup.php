<?php
session_start();
include ("phpFunctions.php");
if($_SESSION['username'])
{
	redirect('index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Adobe GoLive" />
		<title>PHP Blogging application</title>
		<link rel="stylesheet" type="text/css" href="design.css" />
</head>		
<body>
	<div id="outline">
		<div id="title">
			<h3>PhpBlog.</h3>
		</div>
		
		<div id="caption">
			<h5>Welcome Guest</h5>
			<?php
			echo $errorMessage;
			?>
		</div>
		
		<div id="text">
			<h1>Join us! Create and share exciting blogposts</h1>
			<br /><br />
			<form action="register_user.php" method="post">
				<table>
					<tr>
					<td>Username :</td> <td><input type="text" name="newusername"></input></td>
					</tr>
					<tr>
					<td>Password  : </td><td><input type="password" name="newpassword"></input></td>
					</tr>
					<tr>
					<td>Confirm password  : </td><td><input type="password" name="confpassword"></input></td>
					</tr>
					<tr>
						<td colspan="2" align='center'><input type="Submit" name="Submit" value="Submit"></td>
					</tr>
				</table>
			</form>
		</div>
		
	</div>
	
</body>
</html>