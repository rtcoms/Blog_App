<?php
	include ("phpFunctions.php");
	session_start();
	if(!$_SESSION['username'])
	{
		redirect('index.php');
	}
?>	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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
						echo "welcome "."<b>".$_SESSION['username']."</b>";	
						echo '<br />';
						echo '<a href="main.php">Main page</a>';
						echo '<br />';
						echo '<a href="logout.php">Log out</a>';
					?>
				</div>

				<div id="text">
					<form method='post' action='createpost.php'>
						<?php

						echo '<table>';
							echo '<tr>';
								echo '<td>';
									echo 'Title';
								echo '</td>';
								echo '<td>';
									echo '<input type=\'textbox\' name=\'posttitle\' size=\'80\'>';
								echo '</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>';
										echo 'Content';
								echo '</td>';
								echo '<td>';
									echo '<textarea name=\'postcontent\' cols=\'58\' rows=\'30\' wrap=\'hard\'></textarea>';
								echo '</td>';
							echo '</tr>';

							echo '<tr>';
								echo '<td>';
									echo 'Category';
								echo '</td>';
								echo '<td>';
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
								echo '<td colspan="2" align="center">';
									echo '<input type="Submit" action="submit" value="Go">';
								echo '</td>';
							echo '</tr>';
						echo '</table>';

						?>
					</form>
				</div>

			</div>
		</body>
	</html>