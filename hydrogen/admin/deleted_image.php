<?php
include("../config.php");
$illegal_image= $_GET['header'];
$id = $_GET['id'];

$result_file = mysql_query("SELECT * FROM images WHERE id = '$id'");
while ($row = mysql_fetch_array($result_file))
{
	$file = $row['image'];
}
$newfile = strstr($file, 'u');

unlink($newfile);

$query = "DELETE  FROM images WHERE  id = '$id' ";
                    $result = mysql_query($query);
					
					if ($query){
					}else{ 
						echo "there is a problem";
					}
header('location:modify.php?p=3');
?>					
