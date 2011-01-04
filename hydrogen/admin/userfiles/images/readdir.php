<?php
include("../../../config.php");
echo'<link type="text/css" rel="stylesheet" href="../../css/style.css" />';
// Define the full path to your folder from root 
$path ="../images";

$exceptions = array( "." , "..", "readdir.php", "upload.form.php","upload.processor.php", "upload.success.php");
echo"<ul>";
// Open the folder 
$dir_handle = @opendir($path) or die("Unable to open $path"); 
// Loop through the files 
while ($file = readdir($dir_handle)) { 
if(!in_array($file,$exceptions)){
	echo '
  <li style="border-bottom:#000 2px solid; padding:14px; color:#fff;"><a href="http://www.'.$CFG->wwwroot.'admin/userfiles/images/'.$file.'" style=" color:#fff;">http://www.'.$CFG->wwwroot.'admin/userfiles/images/'.$file.'</a><br/><img src="http://www.'.$CFG->wwwroot.'admin/userfiles/images/'.$file.'" height="200" style="border:none;"> <a href="../../deleteduserimage.php?id='.$file.'" onclick="return confirm(\'Wait!!! Are you sure you want to delete '.$file.'.  This action cannot be undone!!\');" style="float:right;"><img src="../../images/delete.png" title="delete '.$file.'" height="30px"/></a></li>';
}
}
// Close 
closedir($dir_handle); 
echo "</ul>";
?>