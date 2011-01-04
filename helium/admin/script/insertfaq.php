<?php
include("../../config.php");
$article = $_POST['editor2_content'];
$title = $_POST['quest'];
$category = $_POST['category'];
$date = $_POST['date'];

				$query1 = "INSERT INTO faq  SET question = '$title', answer = '$article', category = '$category', date = '$date' ";
				$result1 = mysql_query($query1);
header('Location:../index.php');						
?>