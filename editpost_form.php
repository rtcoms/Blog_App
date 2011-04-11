<?php
session_start();
include ("phpFunctions.php");
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

	<!-- Includeing jquery.js-->
	<script type="text/javascript" src="jquery.js"></script>          
	 <script type="text/javascript">                                         
	   // we will add our javascript code here   
	   $(document).ready(function(){
			//validating for empty textboxes for username and password	
			$('#submit').click(function(){
				
				if($.trim($('textarea[name="postcontent"]').val()) === '' || $.trim($('input[name="posttitle"]').val()) === '' || $.trim($('select[name="postcategory"]').val()) === '')
				{
					alert("All fields are requires");
					return false;
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
        
      </div>
		<hr>
      <br />
	  <br />

      
	   <div class="span-5">
			<br />
	        <?php
				echo "welcome "."<b>".$_SESSION['username']."</b>";	
				echo '<br />';
				echo '<a href="main.php">Main page</a>';
				echo '<br />';
				echo '<a href="createpost_form.php">Create new post</a>';
				echo '<br />';
				echo '<a href="logout.php">Log out</a>';
			?>
	   </div>
	
      <div class="span-18 last border-left">
	<form method='post' action='editpost.php'>
			<?php
			
			$postDetails = retrievePost($_GET['postid']);

			echo '<input type=\'hidden\' name=\'postid\' value=\''.$_GET['postid'].'\'</input>';
			echo '<table>';
				echo '<tr>';
					echo '<td  class="large tdbgcolor">';
						echo 'Title';
					echo '</td>';
					echo '<td  class="large tdbgcolor">';
						echo '<input type=\'textbox\' name=\'posttitle\' size=\'80\' value=\''.$postDetails[1].'\'>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td  class="large tdbgcolor">';
							echo 'Content';
					echo '</td>';
					echo '<td  class="large tdbgcolor">';
						echo '<textarea name=\'postcontent\' cols=\'58\' rows=\'30\' wrap=\'hard\'>'.$postDetails[2].'</textarea>';
					echo '</td>';
				echo '</tr>';

				echo '<tr>';
					echo '<td  class="large tdbgcolor">';
						echo 'Category';
					echo '</td>';
					echo '<td  class="large tdbgcolor">';
						echo '<select name="postcategory">';
							$postCategories = retrieveCategories();
							while($category=$postCategories->fetch(SQLITE_ASSOC))
							{
								if($category['categoryname'] === $postDetails[3])
								{
									echo '<option value="'.$category['categoryname'].'" selected="true">';
										echo $category['categoryname'];
									echo '</option>';
								}
								else
								{
									echo '<option value="'.$category['categoryname'].'">';
										echo $category['categoryname'];
									echo '</option>';
								}
							}
						echo '</select>';
					echo '</td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<td colspan="2" align="center"  class="large tdbgcolor">';
						echo '<input type="Submit" action="submit" value="Go" id="submit">';
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		
			?>
      </div>

      <hr>
    </div>
  </body>
</html>
