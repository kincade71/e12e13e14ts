<?php 
include("../../config.php");

$name = $_POST['name'];
$id = $_POST['id'];

$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$sql = "UPDATE navigation  SET text = '$name' WHERE id = '$id' ";
				$result = mysql_query($sql);
echo "$name"
?>
