<?php
// Define the full path to your folder from root 
$path ="userfiles/js/";

$exceptions = array( "." , ".."   , "readdir.php",".DS_Store");
echo"<ul style=\"width:100%;\">";
// Open the folder 
$dir_handle = @opendir($path) or die("Unable to open $path"); 
// Loop through the files 
while ($file = readdir($dir_handle)) { 
if(!in_array($file,$exceptions)){
	echo '
  <li style="border-bottom:#000 2px solid; padding:14px;">'.$file.' <a href="delete/deletedjs.php?id='.$file.'" onclick="return confirm(\'Wait!!! Are you sure you want to delete '.$file.'.  This action cannot be undone!!\');" style="float:right;"><img src="images/delete.png" title="delete '.$file.'" height="30px"/></a> <a href="designer.php?p=5&edit='.$file.'"  style="float:right; padding-rigth:2px;"><img src="images/edit.png" title="edit '.$file.'" height="30px"/></a> </li>';
}
}
// Close 
closedir($dir_handle); 
echo "</ul>";
?>