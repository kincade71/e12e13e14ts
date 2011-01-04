<?php
// Define the full path to your folder from root 
$path ="../theme";
$i = 0;

$exceptions = array( "." , ".."   , "readdir.php",".DS_Store");
// Open the folder 
$dir_handle = @opendir($path) or die("Unable to open $path"); 
// Loop through the files 
while ($file = readdir($dir_handle)) { 
if(!in_array($file,$exceptions)){
	echo '
  <tr><td><input name="theme" type="radio" id="theme_'.$i++.'" value="'.$file.'" /><a href="#" title="click to preview" onclick="popup2(\'../index.php?preview=true&published=true&category=home&theme='.$file.'\')">'.$file.'</a></td></tr>';
}
}
// Close 
closedir($dir_handle); 
?>