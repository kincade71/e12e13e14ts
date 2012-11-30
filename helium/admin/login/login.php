<?php 
include('../../config.php');
$result = mysql_query('SELECT * FROM  settings');
while($row = mysql_fetch_array($result))
  {
  $calendar = $row['calendar'];
  $theme = $row['theme'];
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CFG->sitename?></title>
<?php
if($theme == "default"){
			echo'<link type="text/css" rel="stylesheet" href="../../css/style.css" />
			 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">';
	}else{
		if($preview == "true" && $published = "true"){
			echo'<link type="text/css" rel="stylesheet" href="../../theme/'.$theme.'/style.css" />
			 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">';
		}else{
		//do nothing
		}
		if($preview == "true"){
	echo'<link type="text/css" rel="stylesheet" href="themedevarea/'.$theme.'/style.css" />
			 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">';
		}
else{
		echo'<link type="text/css" rel="stylesheet" href="../../theme/'.$theme.'/style.css" />
			 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">';
}
}?>
</head>
<body>
<div id="wrapper">
  <div id="wrapper2">
    <div id="header">
      <div id="logo">
        <h1><a href="<?php echo $CFG->wwwroot; ?>"><?php echo $CFG->sitename; ?></a></h1>
      </div>
      <div id="menu">
        <ul>
        </ul>
      </div>
    </div>
    <!-- end #header -->
    <div id="page">
      <div id="content">
        <div class="post"><table align="center" class="bigtable" valign="middle" height="100%" width="320px" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td width="49%"> <form action="scripts/checklogin.php" method="post" >
    <div  id="sitename"> <?php //echo $CFG->sitename?></div>
        <P class=style1><br>
          <?php echo $CFG->sitename ?> admin log-in</P>
        <DIV align=center></DIV>
        <table>
          <tr>
            <td><DIV align=left><SPAN class=style5>Username: </SPAN></DIV></td>
            <td><INPUT  maxLength="32" size="35" name="user" class="field"></td>
          </tr>
          <tr>
            <td><DIV align=left><SPAN class=style5>Password: </SPAN></DIV></td>
            <td><INPUT  maxLength="32" size="35" name="pass" type="password" class="field"></td>
          <tr>
            <td colspan="2" align="right"><INPUT type="submit" value="Log-In" name="Submit2" class="submit">
            </td>
          </tr>
        </table>
      </FORM>
  </tr>
</table> </div>
      </div>
      <!-- end #content -->
      <div id="sidebar">
        <ul>
          <li>
            <ul>
            </ul>
          </li>
        </ul>
      </div>
      <!-- end #sidebar -->
      <div style="clear: both;">&nbsp;</div>
      <div id="widebar">
        <div id="colA"> </div>
        <div id="colB"> </div>
        <div id="colC"> </div>
        <div style="clear: both;">&nbsp;</div>
      </div>
      <!-- end #widebar --> 
    </div>
    <!-- end #page --> 
  </div>
  <!-- end #wrapper2 -->
  <div id="footer">
    <p> &copy; 2010 Hydrogen (Helium) | <a href="admin/" target="_blank">Login</a><br />
<a href="http://www.e12e.net" target="_blank" style="border:none;"><span>Powered By: Helium&reg;</span></a> Current Theme: <?= $theme ?></p>
  </div>
</div>
<!-- end #wrapper -->
</body>
</html>
