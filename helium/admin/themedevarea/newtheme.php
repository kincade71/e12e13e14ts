<?php
$themename = $_POST['themename'];
$css = $_POST['css'];

mkdir($themename,0777);
mkdir($themename."/images",0777);
$Saved_File = fopen($themename."/style.css", 'w'); 
fwrite($Saved_File, $css); 
fclose($Saved_File); 
header("location:../themebuilder.php");
?>