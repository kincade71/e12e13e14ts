<?php 
include("../../config.php");

$details = $_POST['details'];
$id = $_POST['id'];

$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$sql = "UPDATE calendar  SET requester = '$details' WHERE id = '$id' ";
				$result = mysql_query($sql);
header('location:../modify.php?p=7');
?>
