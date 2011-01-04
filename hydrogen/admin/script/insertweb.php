<?php
include("../../config.php");
$article = $_POST['editor1_content'];
$title = $_POST['title'];
$category = $_POST['category'];

$link1=mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$query1 = "INSERT INTO content  SET header = '$title', article = '$article', category = '$category' ";
				$result1 = mysql_query($query1);
header('Location:../index.php');						
?>