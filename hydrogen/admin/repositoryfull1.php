<?php include("../config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css" media="screen"> 
 
.infiniteCarousel a img {
  border:none;
  width:90px;
  float:left;
  margin-left:2px;
  margin-top:2px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
}
</style>
<link rel="stylesheet" href='css/hoverbox.css' type="text/css" media="screen, projection" />
<!--[if lte IE 7]>
<link rel="stylesheet" href='css/ie_fixes.css' type="text/css" media="screen, projection" />
<![endif]--> 
</head>

<body>
<div class="infiniteCarousel">
  <div class="wrapper">
image repository
<hr />
<ul class="hoverbox">
<?php
$result = mysql_query('SELECT * FROM `images` WHERE `category` = \'repository\' ');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"javascript:;\" onClick=\"opener.editor2.addImage('".$CFG->wwwroot.$row['image']."')\">
  <img src=\"".$CFG->wwwroot.$row['image']."\" height=\"50\"/><img src=\"".$CFG->wwwroot.$row['image']."\" height=\"50\" class=\"preview\"/></;i></a>";
  }
?>
</ul>        
  </div>
</div>
</body>
</html>
