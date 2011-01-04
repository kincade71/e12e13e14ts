<?php
session_start();
include("../../config.php");

$sql="SELECT * FROM users WHERE username='$_SESSION[user]' and pass='$_SESSION[pass]'";
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
if(isset($_SESSION['pass']))
{
	//Do Nothing
}
else
{
	header ("Location:login/login.php");
}

$query = "SELECT image FROM image_table ORDER BY  id";
$result = mysql_query($query);
$query1 = "SELECT caption FROM image_table ORDER BY  id";
$result1 = mysql_query($query1);
$query2 = "SELECT title FROM image_table ORDER BY  id";
$result2 = mysql_query($query2);
$query3 = "SELECT date FROM image_table ORDER BY  id";
$result3 = mysql_query($query3); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title></title>
<meta http-equiv="Content-Language" content="en-us" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<!-- Begin Stylesheets -->
<style type="text/css">
.back
{
	display: inline-block;
	outline: none;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	font-weight:bold;
	color:#FFFFFF;
	margin-left:750px;
	font: 14px/100% Arial, Helvetica, sans-serif;
	padding: .5em 1em .25em;
	text-shadow: 0 1px 1px rgba(0,0,0,.3);
	-webkit-border-radius: .5em;
	-moz-border-radius: .5em;
	border-radius: .5em;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	box-shadow: 0 1px 2px rgba(0,0,0,.2);
}
.back:hover
{
text-decoration: none;
}
.back:active
{
position: relative;
	top: 1px;
}
.gray {
	color: #e9e9e9;
	border: solid 1px #555;
	background: #6e6e6e;
	background: -webkit-gradient(linear, left top, left bottom, from(#888), to(#575757));
	background: -moz-linear-gradient(top,  #888,  #575757);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#888888', endColorstr='#575757');
}
.gray:hover {
	background: #616161;
	background: -webkit-gradient(linear, left top, left bottom, from(#757575), to(#4b4b4b));
	background: -moz-linear-gradient(top,  #757575,  #4b4b4b);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#757575', endColorstr='#4b4b4b');
}
.gray:active {
	color: #afafaf;
	background: -webkit-gradient(linear, left top, left bottom, from(#575757), to(#888));
	background: -moz-linear-gradient(top,  #575757,  #888);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#575757', endColorstr='#888888');
}
/*end*/
</style>
<!-- End Stylesheets -->
<!-- Begin JavaScript -->
<script src="admin/script/jquery.js" type="text/javascript"></script>
<script src="admin/script/jquery.jeditable.js" type="text/javascript"></script>  
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_name').editable('script/update_name.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit name...',
		 name : 'name'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_url').editable('script/update_url.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit url...',
		 name : 'url'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_about').editable('script/update_about.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit about section...',
		 name : 'about'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_comment').editable('script/update_comment.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit comment...',
		 name : 'comment'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_category').editable('script/update_category.php', { 
  	     data   : " {'dev/design':'dev/design','flash':'flash','experiments':'experiments', 'main':'main' , 'ai':'ai','ps':'ps','id':'id','printmain':'printmain','welcome':'welcome'}",
       	 type   : 'select',
         submit    : 'OK',
		 name : 'category'
     });
 });

</script>
<!-- End JavaScript -->
<style type="text/css">
<!--
.header {
	color: #FFF;
	padding-left:25px;
}
-->
</style>
</head>
<body class="internal tech" onLoad="StartSlideShow()">
<div class="container1">
<div id="headerwrapper">  <div class="header" style="float:right;">Welcome: <?php echo $_SESSION['last']; ?> | <a href="admin/logout.php" title="Logout: <?php echo $_SESSION['name']; ?>  <?php echo $_SESSION['last']; ?>">Logout</a>
  </div> <a href="index.php" >
  <div id="headerlogo" class="logoposition">
    <div style="padding-left:175px; padding-top:-5px; font-size:36px; line-height:35px; border:none; text-decoration:none; font-weight:bold; color:#fff; font-family:Arial, Helvetica, sans-serif;text-shadow:-1px 1px 1px  #000;">Student Services <br/>Admin Page</div>
  </div>
  </a>
  <div class="contactposition">  </div>
</div>
<div class="nav">
  <div class="mainnav">
    <!--main navigation-->
    <div class="topnav">
      <ul>
<li><a href="add.php">add</a></li>
<li><a href="delete.php">delete</a></li>
<li><a href="admin/modify.php">modify</a></li>
<li><a href="admin/photo.php">photo</a></li>
      </ul>
    </div>
  </div>
  <div style="position:absolute !important; top:14px !important; right:0px !important;bottom:35px !important; height:35px !important;"><a href="../admissions/contact-ecpi.php">Contact Us</a></div>
  <!--  End Nav -->
</div>
<div id="contentwrapper">

<div id="content-body">
  <div> 
    <div id="div">
      <div id="div2">
        <h2></h2>
      </div>
      <div id="image-container" style="background-image:url(loading.gif)">
	  
      </div>
    </div>
  </div>
</div>
<div id="column01"> 
    <h1><span class="subheader"></span></h1>
	<?php
	include('../../admin/upload.form.php');
	?>
    <p class="clear">&nbsp;</p>
  </div>
  <div id="column02" style="margin-top:0">
    <div id="relatedfields">
      <h2 class="formheader">-- Students --</h2>
      <ul class="relatedfieldslist">

      </ul>
    </div>
    <div id="relatedfields">
      <h2 class="formheader">-- IT Services --</h2>
      <ul class="relatedfieldslist">

      </ul>
    </div>
    <div id="relatedfields">
      <h2 class="formheader"> -- Special Pricing --</h2>
      <ul class="relatedfieldslist">

</ul>
 </div>
  </div>
</div>
<div id="footerwrapper"> &copy; <?php echo date('Y'); ?> ECPI College of Technology </div>
</div>
</body>
</html>
