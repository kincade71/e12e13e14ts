<?php
include("../../config.php");
$article = utf8_encode($_POST['editor1_content']);
$title = $_POST['title'];
$category = $_POST['category'];
$month = date('m');
$year = date('Y');

$link1=mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$query1 = "INSERT INTO content  SET header = '$title', article = '$article', category = '$category', month = '$month', year = '$year' ";
				$result1 = mysql_query($query1);
header('Location:../index.php');						
?>