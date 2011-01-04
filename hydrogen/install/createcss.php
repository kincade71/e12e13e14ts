<?php
include('../config.php');
/*create css*/
$install_faq = $_POST['faq'];
$navigation_pos = $_POST['nav_pos'];
$secondary_nav = $_POST['RadioGroup1'];

$query ="CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_position` VARCHAR(9) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='a single table to refrence various settings';";

$result = mysql_query($query);

$query1 = "INSERT INTO settings SET nav_position = '$navigation_pos'";
				$result1 = mysql_query($query1);

$myFile = "../css/style.css";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = 'body {
	font-family:Arial, Helvetica, sans-serif;
	background-color:#333;
}
/*main container*/
#container {
	background-color:#CCC;
	height:auto;
	width:970px;
	padding:5px;
	margin-left:auto;
	margin-right:auto;
	-Moz-Border-Radius:4px;
	-Webkit-Border-Radius:4px;
}
/*header style for sit name*/
#sitename {
	padding-left:250px;
	padding-top:25px;
	text-decoration:none;
	font-weight:bold;
	font-size:44px;
	color:#000;
	text-shadow:-1px 1px 1px #4A4947;
	text-transform:uppercase;
}
/*site main navigation*/
.nav {
	border-bottom:#000 2px solid;
}
.nav ul {
	display:inline;
	width:auto;
	font-size:18px;
}
.nav li {
	display:inline;
	padding:5px;
	text-decoration:none;
}
.nav li a:link {
	text-decoration:none;
	color:#fff;
}
.nav li a:hover {
	text-decoration:underline;
	color:#fff;
}
.nav li a:visited {
	text-decoration:none;
	color:#fff;
}
/*main content*/
h2 {
	color: #0061a9;
	font-size: 1.5em;
}
.clear {
	height:15px;
	width:auto;
}
h1, .subheader {
	text-align:right;
	clear:both;
	width:970px;
	text-transform:uppercase;
}
#article {
	width:700px;
	margin-left:auto;
	margin-right:auto;
}
/*secondary navigation*/
#column02 {
	/*background-color:#333;*/
	padding:4px;
	height:auto;
	width:100px;
	float:'.$navigation_pos.';
	/*text-transform:capitalize;
	-Moz-Border-Radius:4px;
	-Webkit-Border-Radius:4px;*/
	border-top:#000 2px solid;
	border-bottom:#000 2px solid;
	text-align:left;
}
#column02 ul {
	list-style:square;
	list-style-position:inside;
	width:auto;
	height:auto;
}
#column02 li {
	font-weight:bold;
	color:#FFF;
}
#column02 li a:link {
	text-decoration:none;
	color:#FFF;
}
#column02 li a:hover {
	text-decoration:none;
	color:#FFF;
}
#column02 li a:visited {
	text-decoration:none;
	color:#FFF;
}
/*footer*/
#footer {
	clear:both;
	height:20px;
	border-top:#000 2px solid;
	width:auto;
	height:auto;
	padding:5px;
	text-align:center;
	font-weight:bold;
}
#footer div
{
	clear:both;
	margin-top:10px;
}
#footer ul
{
	width:150px;
	text-align:left;
	float:left;
	margin-left:10px;
}
#main_footer_nav
{
	border-bottom:#000 2px solid;
	text-align:left;
}
#footer a:link {
	text-decoration:none;
	color:#fff;
}
#footer a:hover {
	text-decoration:none;
	color:#fff;
}
#footer a:visited {
	text-decoration:none;
	color:#fff;
}
';
fwrite($fh, $stringData);
fclose($fh);

if($navigation_pos == "left"){
	$navigation_pos = "lefttop";
}elseif ($navigation_pos == "right"){
	$navigation_pos ="lefttop";
}else{$navigation_pos = "main";}

$sql = "UPDATE navigation  SET category = '$navigation_pos'";
				$result = mysql_query($sql);

/*create index*/
$new_index = "../index.php";
$fh1 = fopen($new_index, 'w') or die("can't open file");
$index = '<?php
$config = "config.php";
if (file_exists($config)) {
    include("config.php");
} else {
    header("Location:install/install.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CFG->sitename ?></title>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>

<body>    <div>
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
$result1 = mysql_query(\'SELECT * FROM content WHERE category ="home" ORDER BY "id" ASC LIMIT 1 \');
while($row1 = mysql_fetch_array($result1))
  {
  echo"<h1><span class=\"subheader\">".$row1[\'category\']."</span></h1>";
  }
  ?>';
 
 if($navigation_pos != "main" || $secondary_nav == "yes"){ 
$index.='<div id="column02">
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
	 $index.="";
} 
$index .='<?php
$result = mysql_query(\'SELECT * FROM content WHERE category ="home" ORDER BY "id" ASC\');
while($row = mysql_fetch_array($result))
  {
  echo"<div id=\"article\"><h2>".$row[\'header\']."</h2>".$row[\'article\']."<p class=\"clear\">&nbsp;</p></div>";
  }
  ?>
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
fwrite($fh1, $index);
fclose($fh1);


if($install_faq == 'yes')

{
/*create faq and companion files*/
$new_faq = "../faq.php";
$fh2 = fopen($new_faq, 'w') or die("can't open file");
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
     if($navigation_pos != "main" || $secondary_nav == "yes"){ 
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
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
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
     if($navigation_pos != "main" || $secondary_nav == "yes"){ 
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

	
$new_sort = "../sortby.php";
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
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
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
     if($navigation_pos != "main" || $secondary_nav == "yes"){ 
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

$query7 = "INSERT INTO `navigation` (`id`, `text`, `url`, `title`, `category`) VALUES
(2, 'faq', 'faq.php', 'faq', '".$navigation_pos."');";

$result7 = mysql_query($query7);
}
else
{
	//do nothing
};
$new_footer = "../footer.php";
$fh3 = fopen($new_footer, 'w') or die("can't open file");
$footer = '  <div id="footer">
          <ul>
          <li id="main_footer_nav">Main</li>
            <?php
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="main"\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
          </ul>';
             if($navigation_pos != "main" || $secondary_nav == "yes"){ 
$footer.='<ul>
            <li id="main_footer_nav">Secondary</li>
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
        </ul>';
			 }else{
				 //do nothing
			 }

$footer.='<div style="padding-top:5px;"> &copy; <?php echo date("Y"); ?> <?php echo $CFG->sitename?> | <a href="admin/" target="_blank">Login</a> <a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0; float:left;" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a> <a href="http://www.e12e.net" target="_blank" style="border:none;"><img src="admin/images/e12bannersmall.png" style="float:right;" /></a></div></div>';

fwrite($fh3, $footer);
fclose($fh3);	
	
header('Location:../index.php');

?>