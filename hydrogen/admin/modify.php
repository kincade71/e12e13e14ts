<?php
session_start();
include("../config.php");

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
$role = $_SESSION['role'];
$p = $_GET['p'];
$token = md5("e12e13e14ts");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $CFG->sitename ."&nbsp; admin"; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link type="text/css" rel="stylesheet" href="css/style.css" />
<!-- End Stylesheets -->
<script src="script/jquery.js" type="text/javascript"></script>
<script src="script/jquery.jeditable.js" type="text/javascript"></script>
<script src="script/jquery.jeditable.ajaxupload.js" type="text/javascript" ></script>
<script type="javascript" src="script/jquery.ajaxfileupload.js"></script>
<style type="text/css">
.back {
	text-align:right;
}
</style>
</head>

<body>
<div id="container">
  <div style="float:right;"> Welcome: <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['last']; ?> | <?php echo $role; ?> | <a href="logout.php" title="Logout: <?php echo $_SESSION['name']; ?>  <?php echo $_SESSION['last']; ?>">Logout</a> || <a href="http://www.e12e.net/faq.php?v=1&token = <?php echo $token; ?>" target="_blank">Help</a><br />
  </div>
  <div style="padding-left:175px; padding-top:-5px; font-size:36px; line-height:35px; border:none; text-decoration:none; font-weight:bold; color:#fff; font-family:Arial, Helvetica, sans-serif;text-shadow:-1px 1px 1px  #000;"><?php echo $CFG->sitename?> 
    admin page</div>
  <div class="nav">
    <ul>
      <li><a href="index.php">create/add</a></li>
      <li><a href="modify.php?p=1">modify/delete</a></li>
        <li><a href="designer.php">designer</a></li>
    </ul>
  </div>
  <div style="float:right; width:600px;">
    <form action="modify.php" method="get">
      <table>
        <tr >
          <td style="background-color:#ccc; padding:4px;"><select name="p" style="float:left; width:520px;">
              <option value="1">Modify Navigation</option>
              <option value="2">Modify Article</option>
              <option value="3">Modify Image</option>
              <option value="5">Modify Page</option>
              <?php if (file_exists('../faq.php')) {
	echo '<option value="4">Modify FAQ</option>';
	}?>
              <option value="6">Modify User</option>
            </select></td>
          <td style="background-color:#ccc; padding:4px;"><input type="submit" value="Go" style="height:35px;width:57px;"/></td>
        </tr>
      </table>
    </form>
    <form action="modify.php?p=<?php echo $p; ?>" method="POST">
      <table>
        <tr>
          <td> Only show items from
            <select name="s" style="width:390px;">
              <option value=""></option>
              <?php
$pagecat = $result = mysql_query('SELECT * FROM `categories`');
while($row = mysql_fetch_array($result))
  {
	echo'<option value="'.$row['category'].'">'.$row['category'].'</option>';
  }  
?>
            </select></td>
          <td><input type="submit" value="Sort"/></td>
        </tr>
      </table>
    </form>
    <?php 
	$p = $_GET['p'];
	if($p == "1"){
	include("modify/navigation.php");
	};
	if ($p == "2"){
	include("modify/article.php");
	};
	if ($p == "3"){
	include("modify/image.php");
	};
		if ($p == "4"){
	include("modify/faq.php");
	};
			if ($p == "5"){
	include("modify/page.php");
	};
	if ($p == "6"){
	include("modify/users.php");
	};
	?>
  </div>
  <div style="float:left; width:350px; padding:5px; margin-top:5px; margin-bottom:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;list-style:none;">
    <?php 
	include("modify/recent/navigation.php");
?>
  </div>
  <div style="float:left; width:350px; padding:5px; margin-top:5px; margin-bottom:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;list-style:none;">
    <?php include("modify/recent/article.php");?>
  </div>
  <div style="float:left; width:350px; padding:5px; margin-top:5px; margin-bottom:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;list-style:none;">
    <?php include("modify/recent/image.php");?>
  </div>
  <div style="float:left; width:350px; padding:5px; margin-top:5px; margin-bottom:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;list-style:none;">
    <?php  include("modify/recent/faq.php");?>
  </div>
  <div style="float:left; width:350px; padding:5px; margin-top:5px; margin-bottom:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;list-style:none;">
    <?php  include("modify/recent/page.php");?>
  </div>
  <div style="float:left; width:350px; padding:5px; margin-top:5px; margin-bottom:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;list-style:none;">
    <?php  include("modify/recent/users.php");?>
  </div>
  <div id="footer">&copy;<?php echo date('Y'); ?> <?php echo $CFG->sitename?></div>
</div>
</body>
</html>