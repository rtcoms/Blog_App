<?php
session_start();
include ("phpFunctions.php");
if($_SESSION['username'])
{
	redirect('main.php');
}
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

	<!-- Includeing jquery.js-->
	<script type="text/javascript" src="jquery.js"></script>          
	 <script type="text/javascript">                                         
	   // we will add our javascript code here   
	   $(document).ready(function(){
		//validating for empty textboxes for username and password	
				$('#submit').click(function(){
				if($.trim($('input[name="newusername"]').val()) === '' || $.trim($('input[name="newpassword"]').val()) === '' || $.trim($('input[name="confpassword"]').val()) === '')
				{
			 		alert("Username or password/confirm passsword can't be empty");
 				}
				else($('input[name="newpassword"]').val() !== $('input[name="confpassword"]').val())
				{
					alert("password and confirm password should be same");
				}
			
			});                           
				});   
	 </script>
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

      
	   <div class="span-5">
			<br />
	       Welcome  <h5>Guest</h5>
	   </div>
	
      <div class="span-18 last border-left">
			<h2>Join us! Create and share exciting blogposts</h2>
			<br /><br />
			<form action="register_user.php" method="post">
				<table>
					<tr>
					<td class="large tdbgcolor" >Username :</td> <td class="tdbgcolor"><input type="text" name="newusername"></input></td>
					</tr>
					<tr>
					<td class="large tdbgcolor">Password  : </td><td class="tdbgcolor"><input type="password" name="newpassword"></input></td>
					</tr>
					<tr>
					<td class="large tdbgcolor">Confirm password  : </td><td class="tdbgcolor"><input type="password" name="confpassword"></input></td>
					</tr>
					<tr class="whitetdbg">
						<td  colspan="2" align='center' class="whitetdbg"><input type="Submit" id="submit" value="Sign Up"></td>
					</tr>
				</table>
			</form>
      </div>

      <hr>
    </div>
  </body>
</html>
