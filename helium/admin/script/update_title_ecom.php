<?php 
include("../../config.php");

$title = $_POST['title'];
$id = $_POST['id'];

$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$sql = "UPDATE ecom  SET title = '$title' WHERE id = '$id' ";
				$result = mysql_query($sql);
echo "$title"
?>
