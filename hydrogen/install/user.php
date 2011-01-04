<?php include('../config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CFG->sitename?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<div id="container">
<div id="sitename"><?php echo $CFG->sitename?></div>
<div id="thought">The e12e13e14ts cms is built with the idea that every site is not the same it is design to arm you the developer wth a ready to go cms that you then build your site around.<hr /><br />
<strong>Setp 2 Create a admin user. </strong> <br />
<br />
Please fill in the information next door to create a admin user. </div>
<form action="createtables.php" method="post" >
<table id="user">
<tr><td colspan="2" style="text-align:center">create admin user</td></tr><tr>
<tr>
  <td>firstname</td><td><input name="first" type="text" /></td></tr>
<tr>
<tr>
  <td>lastname</td><td><input name="last" type="text" /></td></tr>
<tr>
<tr>
  <td>email</td><td><input name="email" type="text" /></td></tr>
<tr>
<tr>
  <td>username</td><td><input name="user" type="text" /></td></tr>
<tr>
<tr>
  <td>password</td><td><input name="pass" type="password" /></td></tr>
<tr>
  <td colspan="2"><input name="" id="submit" type="submit" style="float:right" value="Submit"/></td></tr>
</table>
</form>
<div id="footer"><p><a href="e12e.net" target="_blank">Powered by<br />
e12e13e14ts cms</a></p>
  <a href="e12e.net"><img src="../images/powered by.png"/></a></div>
</div>
</div>
</body>
</html>