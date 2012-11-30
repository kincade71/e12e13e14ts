<?php 
include("../../includes/config.php");

$about = $_POST['about'];
$id = $_POST['id'];

$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$sql = "UPDATE navigation  SET about = '$about' WHERE id = '$id' ";
				$result = mysql_query($sql);
echo "$about"
?>
