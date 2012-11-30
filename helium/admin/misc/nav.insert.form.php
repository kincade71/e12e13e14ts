<?php
include("../../config.php");
$title = $_POST['text'];
$url = $_POST['url'];
$alt =  $_POST['title'];
$category = $_POST['category'];

$link1=mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$query1 = "INSERT INTO navigation  SET text = '$title', url = '$url', title = '$alt', category = '$category' ";
				$result1 = mysql_query($query1);

header('Location:../index.php');						
?>