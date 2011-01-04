<?php
include("../../config.php");
$file = $_GET['file'];
$newfile = $file; 

$query = "DELETE  FROM categories WHERE category = '$newfile' ";
                    $result = mysql_query($query);
					
					if ($query){
					}else{ 
						echo "there is a problem";
					}
$query1 = "DELETE  FROM content WHERE category = '$newfile' ";
                    $result1 = mysql_query($query1);
					
					if ($query1){
					}else{ 
						echo "there is a problem";
					}
					
					$sql = "OPTIMIZE TABLE `categories`";
                    $result2 = mysql_query($sql);
					$sql1 = "OPTIMIZE TABLE `content`";
                    $result3 = mysql_query($sql1);
header('location:../modify.php?p=5');
?>