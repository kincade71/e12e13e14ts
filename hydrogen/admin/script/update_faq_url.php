<?php 
include("../../config.php");

$url = $_POST['url'];
$id = $_POST['id'];

$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$sql = "UPDATE  faq  SET answer = '$url' WHERE id = '$id' ";
				$result = mysql_query($sql);
echo "$url"
?>
