<?php
//session_start();
include ("phpFunctions.php");
//$temppostid = $_GET['postid'];
deletePost($_GET['postid']);
redirect("main.php");
exit();
?>
