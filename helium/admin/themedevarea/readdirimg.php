<?php
include("../../config.php");
$folder = $_GET['folder'];
echo'<link type="text/css" rel="stylesheet" href="../../../css/style.css" />';
// Define the full path to your folder from root 
$path = $folder."/images";

$exceptions = array( "." , ".."   , "readdir.php","readdirimg.php",".DS_Store","upload.form.php","upload.processor.php","upload.success.php","newtheme.php");
echo"<ul style=\"width:700px; list-style:none; margin:0px; padding:0px;\">";
// Open the folder 
$dir_handle = @opendir($path) or die("No saved theme selected Please select a theme from \"Your Saved Themes\" If you don't have any saved themes get started by clicking \"go\" next to \"create new theme\""); 
// Loop through the files 
while ($file = readdir($dir_handle)) { 
if(!in_array($file,$exceptions)){
	echo '
  <li style="border:#aaa 2px solid; padding:14px; color:#000; width:700px;	-Moz-Border-Radius:4px;
	-Webkit-Border-Radius:4px;"> <a href="../delete/deletedthemeimage.php?id='.$file.'&folder='.$path.'&area='.$folder.'" onclick="return confirm(\'Wait!!! Are you sure you want to delete '.$file.'.  This action cannot be undone!!\');" style="float:right;"><img src="../images/delete.png" title="delete '.$file.'" height="30px"/></a>
  URL:<span title="use this url in your '.$folder.' theme css to link to this image">images/'.$file.'</span><br/>
  <img src="'.$path."/".$file.'" height="75" style="border:none;"  title="use the url above in your '.$folder.' theme css to link to this image"></li>';
}
}
// Close 
closedir($dir_handle); 
echo "</ul>";
?>