<?php
$content = $_POST['editor1_content']; 
$edit = $_POST['filename'];

$Saved_File = fopen($edit."/style.css", 'w'); 
fwrite($Saved_File, $content); 
fclose($Saved_File); 
header("location:../themebuilder.php?p=5&edit=".$edit."");
?>