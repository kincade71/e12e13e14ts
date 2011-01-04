<?php
// Define the full path to your folder from root 
$path ="themedevarea/";

$exceptions = array( "." , ".."   , "readdir.php","readdirimg.php",".DS_Store","upload.form.php","upload.processor.php","upload.success.php","newtheme.php","savecss.php","publish.php");
echo"<ul>";
// Open the folder 
$dir_handle = @opendir($path) or die("Unable to open $path"); 
// Loop through the files 
while ($file = readdir($dir_handle)) { 
if(!in_array($file,$exceptions)){
	echo '
  <li style="border-bottom:#000 2px solid; padding:14px;list-style:square;">Theme Name: <a href="#" title="click to preview" onclick="popup2(\'../index.php?preview=true&category=home&theme='.$file.'\')">'.$file.'</a> <a href="delete/deletedtheme.php?id='.$file.'" onclick="return confirm(\'Wait!!! Are you sure you want to delete '.$file.' theme.  This action cannot be undone!!\');" style="float:right;"><img src="images/delete.png" title="delete '.$file.' theme" height="30px"/></a> <a href="themebuilder.php?p=5&edit='.$file.'"  style="float:right; padding-rigth:2px;"><img src="images/edit.png" title="edit '.$file.'" height="30px"/></a></li>';
}
}
// Close 
closedir($dir_handle); 
echo "</ul>";
?>