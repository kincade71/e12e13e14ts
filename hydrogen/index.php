<?php
$config = "config.php";
if (file_exists($config)) {
    include("config.php");
} else {
    header("Location:install/install.php");
}
$catergory = $_GET['category'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CFG->sitename ?></title>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
<div id="container">
        <!--main navigation-->
        <div id="navigation">
          <ul>
            <?php
$result = mysql_query('SELECT * FROM navigation WHERE category ="main"');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row['url']."\" title=\"".$row['title']."\">".$row['text']."</a></li>";
  }
  ?>
          </ul>
        </div>
  <!--  End Nav -->
  <!--content body-->
  <div id="content">
    <?php
$result1 = mysql_query('SELECT * FROM content WHERE category ="'.$catergory.'" ORDER BY "id" ASC LIMIT 1 ');
while($row1 = mysql_fetch_array($result1))
  {
  echo"<h1><span class=\"subheader\">".$row1['category']."</span></h1>";
  }
  ?><?php
$result = mysql_query('SELECT * FROM content WHERE category ="'.$catergory.'" ORDER BY "id" ASC');
while($row = mysql_fetch_array($result))
  {
  echo"<div id=\"article\"><h2>".$row['header']."</h2>".$row['article']."<p class=\"clear\">&nbsp;</p></div>";
  }
  ?>
  </div>
  <!-- Footer-->
<?php  include('footer.php'); ?>  
<script type="text/javascript"> 
window.name = "main"
</script> 
</div>
</body>
</html>
