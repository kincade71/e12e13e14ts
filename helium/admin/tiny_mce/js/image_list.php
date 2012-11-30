<?php 
include('../../../config.php');
// This list may be created by a server logic page PHP/ASP/ASPX/JSP in some backend system.
// There images will be displayed as a dropdown in all image dialogs if the "external_link_image_url"
// option is defined in TinyMCE init.
$result = mysql_query('SELECT * FROM images');
while($row = mysql_fetch_array($result))
  {
$images .= '["'.$row['title'].'", "'.$row['image'].'"],';
  }
  
header("Content-type: text/javascript");
echo 'var tinyMCEImageList = new Array(';
echo rtrim ($images, ",");
echo ');';
?>