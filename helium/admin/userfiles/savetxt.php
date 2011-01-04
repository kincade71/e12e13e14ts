<?php 
$content = $_POST['editor1_content']; 
$file = $_POST['filename'];
$type = ".js";

$Saved_File = fopen("js/".$file.$type, 'w'); 
fwrite($Saved_File, $content); 
fclose($Saved_File); 
header("location:../designer.php");
?>	