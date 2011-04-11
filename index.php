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
			 	if($.trim($('input[name="username"]').val()) === '' || $.trim($('input[name="password"]').val()) === '')
				{
					alert("Username or password can't be empty");
				}
			});                           
		});   
	 </script>
  </head>
  <body>
    <div class="container">
      <h1>My phpBlog.</h1>
      <h2 class="alt">This is a blog created in PHP/SQLite3.</h2>
      <hr>

      <div class="span-24 ">
        this is place for status messages
      </div>
      <br />
	  <br />

      
	   <div class="span-5">
			<br />
	        <h3>Main Menu</h3> 
	  		<?php
				if($_GET['uname1'] != '')
				{
					echo "Hi "."<b>".$_GET['uname1']."</b>".",<br />"." you are logged out from the blogging application";	
				}
				echo "<br />";
				echo '<a href="signup.php">'.'Sign up'.'</a>';
				echo  $errorMessage;
			?>
	   </div>
	
      <div class="span-18 last border-left">
		<h2>LogIn :</h2>
        
		<form action="check_login.php" method="post">
			<table>
				<tr>
				<td class="large" style="background:#e5ecf9;">Username :</td> <td style="background:#e5ecf9;"><input type="text" name="username"></input></td>
				</tr>
				<td class="large" >Password  : </td><td><input type="password" name="password"></input></td>
				<tr>
					<td colspan="2" align="center"><input type="submit" id="submit" value="Submit"></td>
				</tr>
			</table>
		</form>
		
      </div>

      <hr>
    </div>
  </body>
</html>