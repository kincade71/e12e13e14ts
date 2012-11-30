<?php 
include("../../config.php");

$comment = $_POST['comment'];
$id = $_POST['id'];

$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$sql = "UPDATE navigation  SET comment = '$comment' WHERE id = '$id' ";
				$result = mysql_query($sql);
echo "$comment"
?>
