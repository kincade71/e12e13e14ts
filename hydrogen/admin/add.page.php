<?php
include('../config.php');
$pagename = $_POST['pagename'];
$secondary_nav = $_POST['RadioGroup1'];

if ($pagename == 'faq') {
	$myFile = '../faq.php';
$myFileUrl = str_replace('../','',$myFile);

$sql="SELECT nav_position FROM settings";
$navigation_pos = mysql_query($sql);

/*create faq and companion files*/
$fh2 = fopen($myFile, 'w') or die("can't open file");
$faq = '<?php
$config = "config.php";
if (file_exists($config)) {
    include("config.php");
} else {
    header("Location:install/install.php");
}
$num = $_GET[\'num\'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CFG->sitename ?></title>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script src="scripts/prototype.js" type="text/javascript"></script>
<script src="scripts/scriptaculous.js" type="text/javascript"></script>
</head>

<body>
<div>
  <div  id="sitename"> <?php echo $CFG->sitename?></div>
</div>
<div id="container">
  <div>
    <div class="nav">
      <div class="mainnav"> 
        <!--main navigation-->
        <div class="topnav">
          <ul>
            <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="main"\');
while($row = mysql_fetch_array($result))
  {\
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--  End Nav --> 
  <!--content body-->
  <div id="column01">
        <?php
$result1 = mysql_query(\'SELECT * FROM content WHERE category ="faq" ORDER BY id LIMIT 1 \');
while($row1 = mysql_fetch_array($result1))
  {
  echo"<h1><span class=\"subheader\">".$row1[\'category\']."</span></h1>";
  }
  ?>';
     if($navigation_pos != "top" || $secondary_nav == "yes"){ 
$faq.='<div id="column02">
    <div>
<!--<h2 class="formheader">-- --</h2>-->
      <ul>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="lefttop"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="leftmid"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="leftbottom"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
      </ul>
    </div>
  </div>';}
  else{
	 $faq.="";
} 
$faq.='<div style="height:150px; background-image:url(images/searchbar.png); background-position:top; background-repeat:no-repeat;">
      <div style="padding-top:20px; padding-left:220px;">
        <input id="searchText" name="find" size="55" style="height:22px; border:none; font-size:18px;"  title="Type a word or phrase" >
        </form>
      </div>
      <?php echo"<script type=\"text/javascript\">
   new Form.Element.Observer(\'searchText\', 1, 
      function(element, value) {new Ajax.Updater(
        \'search_results\', 
        \'".$CFG->wwwroot."/scripts/livesearch.php\',
         {asynchronous:true, evalScripts:true, 
           onComplete:function(request)
            {Element.hide(\'search_spinner\')}, 
           onLoading:function(request)
            {Element.show(\'search_spinner\')},
           method:\'post\', parameters:\'find=\' + value
})})
</script>";
?>
      <div style="padding-top:20px;">
        <div id="search_results">
          <?php
$result = mysql_query(\'SELECT * FROM faq\');
while($row = mysql_fetch_array($result))
  {
  echo"<a href=\"answer.php?num=".$row[\'id\']."\" style=\" text-decoration:none;\"><h2>".$row[\'question\']."</h2></a>".$row[\'date\']."";
  }
  ?>
          <p class="clear">&nbsp;</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer-->
<?php  include(\'footer.php\'); ?>  <script type="text/javascript"> 
window.name = "main"
</script> 
</div>
</body>
</html>
';
fwrite($fh2, $faq);
fclose($fh2);	

$new_answer = "../answer.php";
$fh4 = fopen($new_answer, 'w') or die("can't open file");
$answer = '<?php
$config = "config.php";
if (file_exists($config)) {
    include("config.php");
} else {
    header("Location:install/install.php");
}
$num = $_GET[\'num\'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CFG->sitename ?></title>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script src="scripts/prototype.js" type="text/javascript"></script>
<script src="scripts/scriptaculous.js" type="text/javascript"></script>
</head>

<body>
<div>
  <div  id="sitename"> <?php echo $CFG->sitename?></div>
</div>
<div id="container">
  <div>
    <div class="nav">
      <div class="mainnav"> 
        <!--main navigation-->
        <div class="topnav">
          <ul>
            <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="main"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--  End Nav --> 
  <!--content body-->
  <div id="column01">
            <?php
$result1 = mysql_query(\'SELECT * FROM content WHERE category ="faq" ORDER BY id LIMIT 1 \');
while($row1 = mysql_fetch_array($result1))
  {
  echo"<h1><span class=\"subheader\">".$row1[\'category\']."</span></h1>";
  }
  ?>';
     if($navigation_pos != "top" || $secondary_nav == "yes"){ 
$answer.='<div id="column02">
    <div>
<!--<h2 class="formheader">-- --</h2>-->
      <ul>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="lefttop"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="leftmid"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="leftbottom"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
      </ul>
    </div>
  </div>';
	 }else{
	 $answer.="";
} 
$answer.='<div style="height:150px; background-image:url(images/searchbar.png); background-position:top; background-repeat:no-repeat;">
      <div style="padding-top:20px; padding-left:220px;">
        <input id="searchText" name="find" size="55" style="height:22px; border:none; font-size:18px;"  title="Type a word or phrase" >
        </form>
      </div>
      <?php echo"<script type=\"text/javascript\">
   new Form.Element.Observer(\'searchText\', 1, 
      function(element, value) {new Ajax.Updater(
        \'search_results\', 
        \'scripts/livesearch.php\',
         {asynchronous:true, evalScripts:true, 
           onComplete:function(request)
            {Element.hide(\'search_spinner\')}, 
           onLoading:function(request)
            {Element.show(\'search_spinner\')},
           method:\'post\', parameters:\'find=\' + value
})})
</script>";
?>
      <div style="padding-top:20px;">
        <div id="search_results">
     <?php
$result = mysql_query("SELECT * FROM faq WHERE id = \'$num\'");

while($row = mysql_fetch_array($result))
  {
if ($num==$row[\'id\'])
{
echo"<h2>".$row[\'question\']."</h2>Date added: ".$row[\'date\']." Category: <a href=\"sortby.php?cat=".$row[\'category\']."\" title=\"see all items in ".$row[\'category\']." topic\">".$row[\'category\']."</a><div id=\"faq\">".$row[\'answer\']."</div>";
}
  }
?>
          <p class="clear">&nbsp;</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer-->
<?php  include(\'footer.php\'); ?>  <script type="text/javascript"> 
window.name = "main"
</script> 
</div>
</body>
</html>
';
fwrite($fh4, $answer);
fclose($fh4);

	
$new_sort = "../sort.php";
$fh5 = fopen($new_sort, 'w') or die("can't open file");
$sort = '<?php
$config = "config.php";
if (file_exists($config)) {
    include("config.php");
} else {
    header("Location:install/install.php");
}
$cat = $_GET[\'cat\'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CFG->sitename ?></title>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script src="scripts/prototype.js" type="text/javascript"></script>
<script src="scripts/scriptaculous.js" type="text/javascript"></script>
</head>

<body>
<div>
  <div  id="sitename"> <?php echo $CFG->sitename?></div>
</div>
<div id="container">
  <div>
    <div class="nav">
      <div class="mainnav"> 
        <!--main navigation-->
        <div class="topnav">
          <ul>
            <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="main"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--  End Nav --> 
  <!--content body-->
  <div id="column01">
            <?php
$result1 = mysql_query(\'SELECT * FROM content WHERE category ="faq" ORDER BY id LIMIT 1 \');
while($row1 = mysql_fetch_array($result1))
  {
  echo"<h1><span class=\"subheader\">".$row1[\'category\']."</span></h1>";
  }
  ?>';
     if($navigation_pos != "top" || $secondary_nav == "yes"){ 
$sort.='<div id="column02">
    <div>
<!--<h2 class="formheader">-- --</h2>-->
      <ul>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="lefttop"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="leftmid"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
        <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="leftbottom"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
      </ul>
    </div>
  </div>';}else{
	 $sort.="";
} 
$sort.='
    <div style="height:150px; background-image:url(images/searchbar.png); background-position:top; background-repeat:no-repeat;">
      <div style="padding-top:20px; padding-left:220px;">
        <input id="searchText" name="find" size="55" style="height:22px; border:none; font-size:18px;"  title="Type a word or phrase" >
        </form>
      </div>
      <?php echo"<script type=\"text/javascript\">
   new Form.Element.Observer(\'searchText\', 1, 
      function(element, value) {new Ajax.Updater(
        \'search_results\', 
        \'".$CFG->wwwroot."/scripts/livesearch.php\',
         {asynchronous:true, evalScripts:true, 
           onComplete:function(request)
            {Element.hide(\'search_spinner\')}, 
           onLoading:function(request)
            {Element.show(\'search_spinner\')},
           method:\'post\', parameters:\'find=\' + value
})})
</script>";
?>
      <div style="padding-top:20px;">
        <div id="search_results">
     <?php
	  echo\'sorted by \'.$cat.\'\';
$result = mysql_query("SELECT * FROM faq WHERE category = \'$cat\'");

while($row = mysql_fetch_array($result))
  {
  echo"<a href=\"answer.php?num=".$row[\'id\']."\" style=\" text-decoration:none;\"><h2>".$row[\'question\']."</h2></a>".$row[\'date\']."";
  }
?>
          <p class="clear">&nbsp;</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer-->
  <?php  include(\'footer.php\'); ?>
  <script type="text/javascript"> 
window.name = "main"
</script> 
</div>
</body>
</html>
';
fwrite($fh5, $sort);
fclose($fh5);	
chmod($new_faq, 0777);

				$query1 = "INSERT INTO categories  SET category = '$pagename'";
				$result1 = mysql_query($query1);
				
				$query2 = "INSERT INTO navigation  SET text = '$pagename', url = '$myFileUrl', title = '$pagename', category = 'main' ";
				$result2 = mysql_query($query2);

header('Location:index.php');
}

$myFileUrl ="index.php?category=".$pagename."";
{

				$query1 = "INSERT INTO categories  SET category = '$pagename'";
				$result1 = mysql_query($query1);
				
				$query2 = "INSERT INTO navigation  SET text = '$pagename', url = '$myFileUrl', title = '$pagename', category = 'main' ";
				$result2 = mysql_query($query2);
}				
header('Location:index.php');
?>