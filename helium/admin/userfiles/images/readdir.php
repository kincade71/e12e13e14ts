<?php
include("../../../config.php");
echo'<link type="text/css" rel="stylesheet" href="../../css/style.css" />';
// Define the full path to your folder from root 
$path ="../images";

$exceptions = array( "." , "..", "readdir.php", "upload.form.php","upload.processor.php", "upload.success.php",".DS_Store","upload.form.index.php","upload.processor.index.php", "upload.success.index.php");
echo"<ul style=\"width:700px; list-style:none; margin:0px; padding:0px;\">";
// Open the folder 
$dir_handle = @opendir($path) or die("Unable to open $path"); 
// Loop through the files 
while ($file = readdir($dir_handle)) { 
if(!in_array($file,$exceptions)){
	echo '
  <li style="border:#aaa 2px solid; padding:14px; color:#000; width:700px;	-Moz-Border-Radius:4px;
	-Webkit-Border-Radius:4px;"> <a href="../../delete/deleteduserimage.php?id='.$file.'" onclick="return confirm(\'Wait!!! Are you sure you want to delete '.$file.'.  This action cannot be undone!!\');" style="float:right;"><img src="../../images/delete.png" title="delete '.$file.'" height="30px"/></a>
  URL: <a href="'.$CFG->wwwroot.'admin/userfiles/images/'.$file.'" style=" color:#000;">'.$CFG->wwwroot.'admin/userfiles/images/'.$file.'</a><br/>
  <img src="'.$CFG->wwwroot.'admin/userfiles/images/'.$file.'" height="75" style="border:none;"></li>';
}
}
// Close 
closedir($dir_handle); 
echo "</ul>";
?>