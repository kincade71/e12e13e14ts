<?php 
include("../../config.php");

$address = $_POST['address'];
$id = $_POST['id'];

$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$sql = "UPDATE calendar  SET room = '$address' WHERE id = '$id' ";
				$result = mysql_query($sql);
echo "$address"
?>