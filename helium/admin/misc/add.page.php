<?php
include('../../config.php');
$pagename = str_replace(" ","_",strtolower($_POST['pagename']));  

$myFileUrl ="index.php?category=".$pagename."";
{

				$query1 = "INSERT INTO categories  SET category = '$pagename'";
				$result1 = mysql_query($query1);
				
				$query2 = "INSERT INTO navigation  SET text = '$pagename', url = '$myFileUrl', title = '$pagename', category = 'main' ";
				$result2 = mysql_query($query2);
}				
header('Location:../index.php');
?>