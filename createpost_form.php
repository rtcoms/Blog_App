<?php
	include ("phpFunctions.php");
	session_start();
	if(!$_SESSION['username'])
	{
		redirect('index.php');
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
			<?php
				echo "welcome "."<b>".$_SESSION['username']."</b>";	
				echo '<br />';
				echo '<a href="main.php">Main page</a>';
				echo '<br />';
				echo '<a href="logout.php">Log out</a>';
			?>
	   </div>
	
      <div class="span-18 last border-left">
			<form method='post' action='createpost.php'>
				<?php

				echo '<table>';
					echo '<tr>';
						echo '<td class="large tdbgcolor">';
							echo 'Title';
						echo '</td>';
						echo '<td class="large tdbgcolor">';
							echo '<input type=\'textbox\' name=\'posttitle\' size=\'80\'>';
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td class="large tdbgcolor">';
								echo 'Content';
						echo '</td>';
						echo '<td class="large tdbgcolor">';
							echo '<textarea name=\'postcontent\' cols=\'58\' rows=\'30\' wrap=\'hard\'></textarea>';
						echo '</td>';
					echo '</tr>';

					echo '<tr>';
						echo '<td class="large tdbgcolor">';
							echo 'Category';
						echo '</td>';
						echo '<td class="large tdbgcolor">';
							echo '<select name="postcategory">';
								$postCategories = retrieveCategories();
								while($category=$postCategories->fetch(SQLITE_ASSOC))
								{
										echo '<option value="'.$category['categoryname'].'">';
											echo $category['categoryname'];
										echo '</option>';
								}
							echo '</select>';
						echo '</td>';
					echo '</tr>';

					echo '<tr>';
						echo '<td colspan="2" align="center" class="large tdbgcolor">';
							echo '<input type="Submit" action="submit" value="Go">';
						echo '</td>';
					echo '</tr>';
				echo '</table>';
				?>
			</form>
      </div>

      <hr>
    </div>
  </body>
</html>
