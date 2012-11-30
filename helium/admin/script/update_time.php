<?php 
include("../../config.php");

$time = $_POST['time'];
$id = $_POST['id'];

$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$sql = "UPDATE calendar SET time = '$time' WHERE id = '$id' ";
				$result = mysql_query($sql);
echo "$time"
?>
